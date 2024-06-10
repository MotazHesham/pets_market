@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.adoptionRequest.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.adoption-requests.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.adoptionRequest.fields.id') }}
                        </th>
                        <td>
                            {{ $adoptionRequest->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.adoptionRequest.fields.refuge_pet') }}
                        </th>
                        <td>
                            {{ $adoptionRequest->refuge_pet->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.adoptionRequest.fields.first_name') }}
                        </th>
                        <td>
                            {{ $adoptionRequest->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.adoptionRequest.fields.last_name') }}
                        </th>
                        <td>
                            {{ $adoptionRequest->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.adoptionRequest.fields.phone') }}
                        </th>
                        <td>
                            {{ $adoptionRequest->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.adoptionRequest.fields.email') }}
                        </th>
                        <td>
                            {{ $adoptionRequest->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.adoptionRequest.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\AdoptionRequest::GENDER_RADIO[$adoptionRequest->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.adoptionRequest.fields.age') }}
                        </th>
                        <td>
                            {{ App\Models\AdoptionRequest::AGE_SELECT[$adoptionRequest->age] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.adoptionRequest.fields.address') }}
                        </th>
                        <td>
                            {{ $adoptionRequest->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.adoptionRequest.fields.note') }}
                        </th>
                        <td>
                            {{ $adoptionRequest->note }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.adoption-requests.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection