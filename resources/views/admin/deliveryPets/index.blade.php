@extends('layouts.admin')
@section('content')
@can('delivery_pet_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.delivery-pets.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.deliveryPet.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.deliveryPet.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-DeliveryPet">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.deliveryPet.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.deliveryPet.fields.from_city') }}
                    </th>
                    <th>
                        {{ trans('cruds.deliveryPet.fields.to_city') }}
                    </th>
                    <th>
                        {{ trans('cruds.deliveryPet.fields.num_of_pets') }}
                    </th>
                    <th>
                        {{ trans('cruds.deliveryPet.fields.date') }}
                    </th>
                    <th>
                        {{ trans('cruds.deliveryPet.fields.pet_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.deliveryPet.fields.note') }}
                    </th>
                    <th>
                        {{ trans('cruds.deliveryPet.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.deliveryPet.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.deliveryPet.fields.phone') }}
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
@can('delivery_pet_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.delivery-pets.massDestroy') }}",
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
    ajax: "{{ route('admin.delivery-pets.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'from_city', name: 'from_city' },
{ data: 'to_city', name: 'to_city' },
{ data: 'num_of_pets', name: 'num_of_pets' },
{ data: 'date', name: 'date' },
{ data: 'pet_type_name', name: 'pet_type.name' },
{ data: 'note', name: 'note' },
{ data: 'name', name: 'name' },
{ data: 'email', name: 'email' },
{ data: 'phone', name: 'phone' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  let table = $('.datatable-DeliveryPet').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection