@extends('layouts.admin')
@section('content')
@can('adoption_request_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.adoption-requests.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.adoptionRequest.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.adoptionRequest.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-AdoptionRequest">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.adoptionRequest.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.adoptionRequest.fields.refuge_pet') }}
                    </th>
                    <th>
                        {{ trans('cruds.adoptionRequest.fields.first_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.adoptionRequest.fields.last_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.adoptionRequest.fields.phone') }}
                    </th>
                    <th>
                        {{ trans('cruds.adoptionRequest.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.adoptionRequest.fields.gender') }}
                    </th>
                    <th>
                        {{ trans('cruds.adoptionRequest.fields.age') }}
                    </th>
                    <th>
                        {{ trans('cruds.adoptionRequest.fields.address') }}
                    </th>
                    <th>
                        {{ trans('cruds.adoptionRequest.fields.note') }}
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
@can('adoption_request_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.adoption-requests.massDestroy') }}",
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
    ajax: "{{ route('admin.adoption-requests.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'refuge_pet_name', name: 'refuge_pet.name' },
{ data: 'first_name', name: 'first_name' },
{ data: 'last_name', name: 'last_name' },
{ data: 'phone', name: 'phone' },
{ data: 'email', name: 'email' },
{ data: 'gender', name: 'gender' },
{ data: 'age', name: 'age' },
{ data: 'address', name: 'address' },
{ data: 'note', name: 'note' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  let table = $('.datatable-AdoptionRequest').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection