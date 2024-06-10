@extends('layouts.admin')
@section('content')
@can('missing_pet_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.missing-pets.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.missingPet.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.missingPet.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-MissingPet">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.missingPet.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.missingPet.fields.first_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.missingPet.fields.last_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.missingPet.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.missingPet.fields.phone') }}
                    </th>
                    <th>
                        {{ trans('cruds.missingPet.fields.pet_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.missingPet.fields.missing_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.missingPet.fields.missing_place') }}
                    </th>
                    <th>
                        {{ trans('cruds.missingPet.fields.receiving_place') }}
                    </th>
                    <th>
                        {{ trans('cruds.missingPet.fields.note') }}
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
@can('missing_pet_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.missing-pets.massDestroy') }}",
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
    ajax: "{{ route('admin.missing-pets.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'first_name', name: 'first_name' },
{ data: 'last_name', name: 'last_name' },
{ data: 'email', name: 'email' },
{ data: 'phone', name: 'phone' },
{ data: 'pet_type_name', name: 'pet_type.name' },
{ data: 'missing_date', name: 'missing_date' },
{ data: 'missing_place', name: 'missing_place' },
{ data: 'receiving_place', name: 'receiving_place' },
{ data: 'note', name: 'note' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  let table = $('.datatable-MissingPet').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection