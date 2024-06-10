@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.refugePet.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.refuge-pets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.refugePet.fields.id') }}
                        </th>
                        <td>
                            {{ $refugePet->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.refugePet.fields.refuge') }}
                        </th>
                        <td>
                            {{ $refugePet->refuge->address ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.refugePet.fields.name') }}
                        </th>
                        <td>
                            {{ $refugePet->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.refugePet.fields.photo') }}
                        </th>
                        <td>
                            @if($refugePet->photo)
                                <a href="{{ $refugePet->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $refugePet->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.refugePet.fields.dob') }}
                        </th>
                        <td>
                            {{ $refugePet->dob }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.refuge-pets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection