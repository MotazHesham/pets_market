@extends('layouts.admin')
@section('content')
@can('clinic_appointment_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.clinic-appointments.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.clinicAppointment.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.clinicAppointment.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-ClinicAppointment">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.clinicAppointment.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.clinicAppointment.fields.client_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.clinicAppointment.fields.phone') }}
                    </th>
                    <th>
                        {{ trans('cruds.clinicAppointment.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.clinicAppointment.fields.address') }}
                    </th>
                    <th>
                        {{ trans('cruds.clinicAppointment.fields.date') }}
                    </th>
                    <th>
                        {{ trans('cruds.clinicAppointment.fields.time') }}
                    </th>
                    <th>
                        {{ trans('cruds.clinicAppointment.fields.age') }}
                    </th>
                    <th>
                        {{ trans('cruds.clinicAppointment.fields.service') }}
                    </th>
                    <th>
                        {{ trans('cruds.clinicAppointment.fields.clinic') }}
                    </th>
                    <th>
                        {{ trans('cruds.clinicAppointment.fields.pet_type') }}
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
@can('clinic_appointment_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.clinic-appointments.massDestroy') }}",
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
    ajax: "{{ route('admin.clinic-appointments.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'client_name', name: 'client_name' },
{ data: 'phone', name: 'phone' },
{ data: 'email', name: 'email' },
{ data: 'address', name: 'address' },
{ data: 'date', name: 'date' },
{ data: 'time', name: 'time' },
{ data: 'age', name: 'age' },
{ data: 'service_name', name: 'service.name' },
{ data: 'clinic_clinic_name', name: 'clinic.clinic_name' },
{ data: 'pet_type_name', name: 'pet_type.name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  let table = $('.datatable-ClinicAppointment').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection