@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.missingPet.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.missing-pets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.missingPet.fields.id') }}
                        </th>
                        <td>
                            {{ $missingPet->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.missingPet.fields.first_name') }}
                        </th>
                        <td>
                            {{ $missingPet->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.missingPet.fields.last_name') }}
                        </th>
                        <td>
                            {{ $missingPet->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.missingPet.fields.email') }}
                        </th>
                        <td>
                            {{ $missingPet->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.missingPet.fields.phone') }}
                        </th>
                        <td>
                            {{ $missingPet->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.missingPet.fields.pet_type') }}
                        </th>
                        <td>
                            {{ $missingPet->pet_type->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.missingPet.fields.missing_date') }}
                        </th>
                        <td>
                            {{ $missingPet->missing_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.missingPet.fields.missing_place') }}
                        </th>
                        <td>
                            {{ $missingPet->missing_place }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.missingPet.fields.receiving_place') }}
                        </th>
                        <td>
                            {{ $missingPet->receiving_place }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.missingPet.fields.note') }}
                        </th>
                        <td>
                            {{ $missingPet->note }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.missing-pets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection