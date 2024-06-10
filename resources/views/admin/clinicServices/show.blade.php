@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.clinicService.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.clinic-services.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.clinicService.fields.id') }}
                        </th>
                        <td>
                            {{ $clinicService->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinicService.fields.clinic') }}
                        </th>
                        <td>
                            {{ $clinicService->clinic->clinic_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinicService.fields.name') }}
                        </th>
                        <td>
                            {{ $clinicService->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinicService.fields.photo') }}
                        </th>
                        <td>
                            @if($clinicService->photo)
                                <a href="{{ $clinicService->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $clinicService->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinicService.fields.short_description') }}
                        </th>
                        <td>
                            {{ $clinicService->short_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinicService.fields.banner') }}
                        </th>
                        <td>
                            @if($clinicService->banner)
                                <a href="{{ $clinicService->banner->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $clinicService->banner->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinicService.fields.description') }}
                        </th>
                        <td>
                            {!! $clinicService->description !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.clinic-services.index') }}">
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
            <a class="nav-link" href="#service_clinic_appointments" role="tab" data-toggle="tab">
                {{ trans('cruds.clinicAppointment.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="service_clinic_appointments">
            @includeIf('admin.clinicServices.relationships.serviceClinicAppointments', ['clinicAppointments' => $clinicService->serviceClinicAppointments])
        </div>
    </div>
</div>

@endsection