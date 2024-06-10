@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.deliveryPet.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.delivery-pets.update", [$deliveryPet->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.deliveryPet.fields.from_city') }}</label>
                <select class="form-control {{ $errors->has('from_city') ? 'is-invalid' : '' }}" name="from_city" id="from_city">
                    <option value disabled {{ old('from_city', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\DeliveryPet::FROM_CITY_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('from_city', $deliveryPet->from_city) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('from_city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('from_city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.deliveryPet.fields.from_city_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.deliveryPet.fields.to_city') }}</label>
                <select class="form-control {{ $errors->has('to_city') ? 'is-invalid' : '' }}" name="to_city" id="to_city">
                    <option value disabled {{ old('to_city', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\DeliveryPet::TO_CITY_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('to_city', $deliveryPet->to_city) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('to_city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('to_city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.deliveryPet.fields.to_city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="num_of_pets">{{ trans('cruds.deliveryPet.fields.num_of_pets') }}</label>
                <input class="form-control {{ $errors->has('num_of_pets') ? 'is-invalid' : '' }}" type="number" name="num_of_pets" id="num_of_pets" value="{{ old('num_of_pets', $deliveryPet->num_of_pets) }}" step="1">
                @if($errors->has('num_of_pets'))
                    <div class="invalid-feedback">
                        {{ $errors->first('num_of_pets') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.deliveryPet.fields.num_of_pets_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date">{{ trans('cruds.deliveryPet.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $deliveryPet->date) }}">
                @if($errors->has('date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.deliveryPet.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pet_type_id">{{ trans('cruds.deliveryPet.fields.pet_type') }}</label>
                <select class="form-control select2 {{ $errors->has('pet_type') ? 'is-invalid' : '' }}" name="pet_type_id" id="pet_type_id">
                    @foreach($pet_types as $id => $entry)
                        <option value="{{ $id }}" {{ (old('pet_type_id') ? old('pet_type_id') : $deliveryPet->pet_type->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('pet_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pet_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.deliveryPet.fields.pet_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="note">{{ trans('cruds.deliveryPet.fields.note') }}</label>
                <textarea class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" name="note" id="note">{{ old('note', $deliveryPet->note) }}</textarea>
                @if($errors->has('note'))
                    <div class="invalid-feedback">
                        {{ $errors->first('note') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.deliveryPet.fields.note_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name">{{ trans('cruds.deliveryPet.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $deliveryPet->name) }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.deliveryPet.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.deliveryPet.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $deliveryPet->email) }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.deliveryPet.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.deliveryPet.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $deliveryPet->phone) }}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.deliveryPet.fields.phone_helper') }}</span>
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