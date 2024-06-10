@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.clinicAppointment.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.clinic-appointments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.clinicAppointment.fields.id') }}
                        </th>
                        <td>
                            {{ $clinicAppointment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinicAppointment.fields.client_name') }}
                        </th>
                        <td>
                            {{ $clinicAppointment->client_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinicAppointment.fields.phone') }}
                        </th>
                        <td>
                            {{ $clinicAppointment->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinicAppointment.fields.email') }}
                        </th>
                        <td>
                            {{ $clinicAppointment->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinicAppointment.fields.address') }}
                        </th>
                        <td>
                            {{ $clinicAppointment->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinicAppointment.fields.date') }}
                        </th>
                        <td>
                            {{ $clinicAppointment->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinicAppointment.fields.time') }}
                        </th>
                        <td>
                            {{ $clinicAppointment->time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinicAppointment.fields.age') }}
                        </th>
                        <td>
                            {{ $clinicAppointment->age }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinicAppointment.fields.note') }}
                        </th>
                        <td>
                            {{ $clinicAppointment->note }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinicAppointment.fields.service') }}
                        </th>
                        <td>
                            {{ $clinicAppointment->service->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinicAppointment.fields.clinic') }}
                        </th>
                        <td>
                            {{ $clinicAppointment->clinic->clinic_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinicAppointment.fields.pet_type') }}
                        </th>
                        <td>
                            {{ $clinicAppointment->pet_type->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.clinic-appointments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection