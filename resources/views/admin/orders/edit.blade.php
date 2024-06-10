@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.order.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.orders.update", [$order->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="order_num">{{ trans('cruds.order.fields.order_num') }}</label>
                <input class="form-control {{ $errors->has('order_num') ? 'is-invalid' : '' }}" type="text" name="order_num" id="order_num" value="{{ old('order_num', $order->order_num) }}">
                @if($errors->has('order_num'))
                    <div class="invalid-feedback">
                        {{ $errors->first('order_num') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.order_num_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="first_name">{{ trans('cruds.order.fields.first_name') }}</label>
                <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ old('first_name', $order->first_name) }}">
                @if($errors->has('first_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('first_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.first_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="last_name">{{ trans('cruds.order.fields.last_name') }}</label>
                <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ old('last_name', $order->last_name) }}">
                @if($errors->has('last_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('last_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.last_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone_number">{{ trans('cruds.order.fields.phone_number') }}</label>
                <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $order->phone_number) }}">
                @if($errors->has('phone_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.phone_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="country_id">{{ trans('cruds.order.fields.country') }}</label>
                <select class="form-control select2 {{ $errors->has('country') ? 'is-invalid' : '' }}" name="country_id" id="country_id">
                    @foreach($countries as $id => $entry)
                        <option value="{{ $id }}" {{ (old('country_id') ? old('country_id') : $order->country->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('country'))
                    <div class="invalid-feedback">
                        {{ $errors->first('country') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.country_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="city">{{ trans('cruds.order.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', $order->city) }}">
                @if($errors->has('city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="shipping_address">{{ trans('cruds.order.fields.shipping_address') }}</label>
                <textarea class="form-control {{ $errors->has('shipping_address') ? 'is-invalid' : '' }}" name="shipping_address" id="shipping_address">{{ old('shipping_address', $order->shipping_address) }}</textarea>
                @if($errors->has('shipping_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shipping_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.shipping_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.order.fields.delivery_status') }}</label>
                <select class="form-control {{ $errors->has('delivery_status') ? 'is-invalid' : '' }}" name="delivery_status" id="delivery_status">
                    <option value disabled {{ old('delivery_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Order::DELIVERY_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('delivery_status', $order->delivery_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('delivery_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('delivery_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.delivery_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total_cost">{{ trans('cruds.order.fields.total_cost') }}</label>
                <input class="form-control {{ $errors->has('total_cost') ? 'is-invalid' : '' }}" type="number" name="total_cost" id="total_cost" value="{{ old('total_cost', $order->total_cost) }}" step="0.01" required>
                @if($errors->has('total_cost'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_cost') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.total_cost_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.order.fields.payment_type') }}</label>
                <select class="form-control {{ $errors->has('payment_type') ? 'is-invalid' : '' }}" name="payment_type" id="payment_type" required>
                    <option value disabled {{ old('payment_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Order::PAYMENT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('payment_type', $order->payment_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.payment_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.order.fields.payment_status') }}</label>
                <select class="form-control {{ $errors->has('payment_status') ? 'is-invalid' : '' }}" name="payment_status" id="payment_status" required>
                    <option value disabled {{ old('payment_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Order::PAYMENT_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('payment_status', $order->payment_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.payment_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="discount_code">{{ trans('cruds.order.fields.discount_code') }}</label>
                <input class="form-control {{ $errors->has('discount_code') ? 'is-invalid' : '' }}" type="text" name="discount_code" id="discount_code" value="{{ old('discount_code', $order->discount_code) }}">
                @if($errors->has('discount_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('discount_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.discount_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cancel_reason">{{ trans('cruds.order.fields.cancel_reason') }}</label>
                <textarea class="form-control {{ $errors->has('cancel_reason') ? 'is-invalid' : '' }}" name="cancel_reason" id="cancel_reason">{{ old('cancel_reason', $order->cancel_reason) }}</textarea>
                @if($errors->has('cancel_reason'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cancel_reason') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.cancel_reason_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.order.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $order->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection