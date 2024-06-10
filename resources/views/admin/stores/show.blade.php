@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.store.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stores.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.store.fields.id') }}
                        </th>
                        <td>
                            {{ $store->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.store.fields.user') }}
                        </th>
                        <td>
                            {{ $store->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.store.fields.store_name') }}
                        </th>
                        <td>
                            {{ $store->store_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.store.fields.phone') }}
                        </th>
                        <td>
                            {{ $store->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.store.fields.address') }}
                        </th>
                        <td>
                            {{ $store->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.store.fields.logo') }}
                        </th>
                        <td>
                            @if($store->logo)
                                <a href="{{ $store->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $store->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.store.fields.cover') }}
                        </th>
                        <td>
                            @if($store->cover)
                                <a href="{{ $store->cover->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $store->cover->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stores.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection