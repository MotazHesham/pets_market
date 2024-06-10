@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.rescueCase.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rescue-cases.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.rescueCase.fields.id') }}
                        </th>
                        <td>
                            {{ $rescueCase->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rescueCase.fields.name') }}
                        </th>
                        <td>
                            {{ $rescueCase->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rescueCase.fields.phone') }}
                        </th>
                        <td>
                            {{ $rescueCase->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rescueCase.fields.email') }}
                        </th>
                        <td>
                            {{ $rescueCase->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rescueCase.fields.address') }}
                        </th>
                        <td>
                            {{ $rescueCase->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rescueCase.fields.description') }}
                        </th>
                        <td>
                            {{ $rescueCase->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rescueCase.fields.photos') }}
                        </th>
                        <td>
                            @foreach($rescueCase->photos as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rescueCase.fields.pet_type') }}
                        </th>
                        <td>
                            {{ $rescueCase->pet_type->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rescue-cases.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection