@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.userPet.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.user-pets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.userPet.fields.id') }}
                        </th>
                        <td>
                            {{ $userPet->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userPet.fields.name') }}
                        </th>
                        <td>
                            {{ $userPet->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userPet.fields.photo') }}
                        </th>
                        <td>
                            @if($userPet->photo)
                                <a href="{{ $userPet->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $userPet->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userPet.fields.dob') }}
                        </th>
                        <td>
                            {{ $userPet->dob }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userPet.fields.pet_type') }}
                        </th>
                        <td>
                            {{ $userPet->pet_type->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userPet.fields.user') }}
                        </th>
                        <td>
                            {{ $userPet->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userPet.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\UserPet::GENDER_SELECT[$userPet->gender] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.user-pets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection