@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.contactu.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Contactu">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.contactu.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.contactu.fields.first_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.contactu.fields.last_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.contactu.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.contactu.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.contactu.fields.message') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contactus as $key => $contactu)
                        <tr data-entry-id="{{ $contactu->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $contactu->id ?? '' }}
                            </td>
                            <td>
                                {{ $contactu->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $contactu->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $contactu->email ?? '' }}
                            </td>
                            <td>
                                {{ $contactu->phone ?? '' }}
                            </td>
                            <td>
                                {{ $contactu->message ?? '' }}
                            </td>
                            <td>


                                @can('contactu_delete')
                                    <form action="{{ route('admin.contactus.destroy', $contactu->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('contactu_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.contactus.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-Contactu:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection