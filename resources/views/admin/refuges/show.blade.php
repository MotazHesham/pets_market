@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.refuge.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.refuges.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.refuge.fields.id') }}
                        </th>
                        <td>
                            {{ $refuge->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.refuge.fields.user') }}
                        </th>
                        <td>
                            {{ $refuge->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.refuge.fields.logo') }}
                        </th>
                        <td>
                            @if($refuge->logo)
                                <a href="{{ $refuge->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $refuge->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.refuge.fields.cover') }}
                        </th>
                        <td>
                            @if($refuge->cover)
                                <a href="{{ $refuge->cover->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $refuge->cover->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.refuge.fields.address') }}
                        </th>
                        <td>
                            {{ $refuge->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.refuge.fields.phone') }}
                        </th>
                        <td>
                            {{ $refuge->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.refuge.fields.about_us') }}
                        </th>
                        <td>
                            {{ $refuge->about_us }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.refuge.fields.photos') }}
                        </th>
                        <td>
                            @if($refuge->photos)
                                <a href="{{ $refuge->photos->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $refuge->photos->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.refuges.index') }}">
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
            <a class="nav-link" href="#refuge_refuge_pets" role="tab" data-toggle="tab">
                {{ trans('cruds.refugePet.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="refuge_refuge_pets">
            @includeIf('admin.refuges.relationships.refugeRefugePets', ['refugePets' => $refuge->refugeRefugePets])
        </div>
    </div>
</div>

@endsection