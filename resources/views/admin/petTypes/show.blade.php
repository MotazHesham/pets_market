@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.petType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pet-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.petType.fields.id') }}
                        </th>
                        <td>
                            {{ $petType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.petType.fields.name') }}
                        </th>
                        <td>
                            {{ $petType->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pet-types.index') }}">
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
            <a class="nav-link" href="#pet_type_clinics" role="tab" data-toggle="tab">
                {{ trans('cruds.clinic.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="pet_type_clinics">
            @includeIf('admin.petTypes.relationships.petTypeClinics', ['clinics' => $petType->petTypeClinics])
        </div>
    </div>
</div>

@endsection