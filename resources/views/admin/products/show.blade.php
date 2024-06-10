@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.product.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.products.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.id') }}
                        </th>
                        <td>
                            {{ $product->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.category') }}
                        </th>
                        <td>
                            {{ $product->category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.name') }}
                        </th>
                        <td>
                            {{ $product->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.main_photo') }}
                        </th>
                        <td>
                            @if($product->main_photo)
                                <a href="{{ $product->main_photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $product->main_photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.photos') }}
                        </th>
                        <td>
                            @if($product->photos)
                                <a href="{{ $product->photos->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $product->photos->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.description') }}
                        </th>
                        <td>
                            {!! $product->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.details') }}
                        </th>
                        <td>
                            {!! $product->details !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.short_details') }}
                        </th>
                        <td>
                            {{ $product->short_details }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.added_by') }}
                        </th>
                        <td>
                            {{ App\Models\Product::ADDED_BY_SELECT[$product->added_by] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.slug') }}
                        </th>
                        <td>
                            {{ $product->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.attributes') }}
                        </th>
                        <td>
                            {{ App\Models\Product::ATTRIBUTES_SELECT[$product->attributes] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.attribute_options') }}
                        </th>
                        <td>
                            {{ $product->attribute_options }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.colors') }}
                        </th>
                        <td>
                            {{ App\Models\Product::COLORS_SELECT[$product->colors] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.tags') }}
                        </th>
                        <td>
                            {{ $product->tags }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.video_provider') }}
                        </th>
                        <td>
                            {{ App\Models\Product::VIDEO_PROVIDER_SELECT[$product->video_provider] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.video_link') }}
                        </th>
                        <td>
                            {{ $product->video_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.discount_type') }}
                        </th>
                        <td>
                            {{ App\Models\Product::DISCOUNT_TYPE_RADIO[$product->discount_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.discount') }}
                        </th>
                        <td>
                            {{ $product->discount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.meta_title') }}
                        </th>
                        <td>
                            {{ $product->meta_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.meta_description') }}
                        </th>
                        <td>
                            {{ $product->meta_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.user') }}
                        </th>
                        <td>
                            {{ $product->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $product->published ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.featured') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $product->featured ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.rating') }}
                        </th>
                        <td>
                            {{ $product->rating }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.current_stock') }}
                        </th>
                        <td>
                            {{ $product->current_stock }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.num_of_sale') }}
                        </th>
                        <td>
                            {{ $product->num_of_sale }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.brand') }}
                        </th>
                        <td>
                            {{ $product->brand->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.products.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection