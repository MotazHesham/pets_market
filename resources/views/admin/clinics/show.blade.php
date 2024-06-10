@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.clinic.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.clinics.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.clinic.fields.id') }}
                        </th>
                        <td>
                            {{ $clinic->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinic.fields.user') }}
                        </th>
                        <td>
                            {{ $clinic->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinic.fields.clinic_name') }}
                        </th>
                        <td>
                            {{ $clinic->clinic_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinic.fields.short_description') }}
                        </th>
                        <td>
                            {{ $clinic->short_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinic.fields.address') }}
                        </th>
                        <td>
                            {{ $clinic->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinic.fields.phone') }}
                        </th>
                        <td>
                            {{ $clinic->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinic.fields.cover') }}
                        </th>
                        <td>
                            @if($clinic->cover)
                                <a href="{{ $clinic->cover->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $clinic->cover->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinic.fields.banner') }}
                        </th>
                        <td>
                            @if($clinic->banner)
                                <a href="{{ $clinic->banner->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $clinic->banner->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinic.fields.logo') }}
                        </th>
                        <td>
                            @if($clinic->logo)
                                <a href="{{ $clinic->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $clinic->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinic.fields.description') }}
                        </th>
                        <td>
                            {!! $clinic->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinic.fields.pet_type') }}
                        </th>
                        <td>
                            @foreach($clinic->pet_types as $key => $pet_type)
                                <span class="label label-info">{{ $pet_type->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.clinics.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#clinic_clinic_services" role="tab" data-toggle="tab">
                {{ trans('cruds.clinicService.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#clinic_clinic_appointments" role="tab" data-toggle="tab">
                {{ trans('cruds.clinicAppointment.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="clinic_clinic_services">
            @includeIf('admin.clinics.relationships.clinicClinicServices', ['clinicServices' => $clinic->clinicClinicServices])
        </div>
        <div class="tab-pane" role="tabpanel" id="clinic_clinic_appointments">
            @includeIf('admin.clinics.relationships.clinicClinicAppointments', ['clinicAppointments' => $clinic->clinicClinicAppointments])
        </div>
    </div>
</div>

@endsection