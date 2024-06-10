@extends('layouts.admin')
@section('content')
@can('volunteer_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.volunteers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.volunteer.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.volunteer.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Volunteer">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.volunteer.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.volunteer.fields.first_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.volunteer.fields.last_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.volunteer.fields.phone') }}
                    </th>
                    <th>
                        {{ trans('cruds.volunteer.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.volunteer.fields.gender') }}
                    </th>
                    <th>
                        {{ trans('cruds.volunteer.fields.age') }}
                    </th>
                    <th>
                        {{ trans('cruds.volunteer.fields.experience') }}
                    </th>
                    <th>
                        {{ trans('cruds.volunteer.fields.fields') }}
                    </th>
                    <th>
                        {{ trans('cruds.volunteer.fields.period_time') }}
                    </th>
                    <th>
                        {{ trans('cruds.volunteer.fields.note') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('volunteer_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.volunteers.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.volunteers.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'first_name', name: 'first_name' },
{ data: 'last_name', name: 'last_name' },
{ data: 'phone', name: 'phone' },
{ data: 'email', name: 'email' },
{ data: 'gender', name: 'gender' },
{ data: 'age', name: 'age' },
{ data: 'experience', name: 'experience' },
{ data: 'fields', name: 'fields' },
{ data: 'period_time', name: 'period_time' },
{ data: 'note', name: 'note' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  let table = $('.datatable-Volunteer').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection