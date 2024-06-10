@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.setting.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.id') }}
                        </th>
                        <td>
                            {{ $setting->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.site_name') }}
                        </th>
                        <td>
                            {{ $setting->site_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.logo') }}
                        </th>
                        <td>
                            @if($setting->logo)
                                <a href="{{ $setting->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $setting->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.phone') }}
                        </th>
                        <td>
                            {{ $setting->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.email') }}
                        </th>
                        <td>
                            {{ $setting->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.address') }}
                        </th>
                        <td>
                            {{ $setting->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.twitter') }}
                        </th>
                        <td>
                            {{ $setting->twitter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.facebook') }}
                        </th>
                        <td>
                            {{ $setting->facebook }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.googleplus') }}
                        </th>
                        <td>
                            {{ $setting->googleplus }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.instagram') }}
                        </th>
                        <td>
                            {{ $setting->instagram }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.description') }}
                        </th>
                        <td>
                            {{ $setting->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.description_2') }}
                        </th>
                        <td>
                            {{ $setting->description_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.keywords_seo') }}
                        </th>
                        <td>
                            {{ $setting->keywords_seo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.author_seo') }}
                        </th>
                        <td>
                            {{ $setting->author_seo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.sitemap_link_seo') }}
                        </th>
                        <td>
                            {{ $setting->sitemap_link_seo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.description_seo') }}
                        </th>
                        <td>
                            {{ $setting->description_seo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.count_stores') }}
                        </th>
                        <td>
                            {{ $setting->count_stores }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.count_pets') }}
                        </th>
                        <td>
                            {{ $setting->count_pets }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.count_tweets') }}
                        </th>
                        <td>
                            {{ $setting->count_tweets }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.count_products') }}
                        </th>
                        <td>
                            {{ $setting->count_products }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection