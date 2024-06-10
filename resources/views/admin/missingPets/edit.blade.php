@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.missingPet.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.missing-pets.update", [$missingPet->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="first_name">{{ trans('cruds.missingPet.fields.first_name') }}</label>
                <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ old('first_name', $missingPet->first_name) }}">
                @if($errors->has('first_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('first_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.missingPet.fields.first_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="last_name">{{ trans('cruds.missingPet.fields.last_name') }}</label>
                <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ old('last_name', $missingPet->last_name) }}">
                @if($errors->has('last_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('last_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.missingPet.fields.last_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.missingPet.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $missingPet->email) }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.missingPet.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.missingPet.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $missingPet->phone) }}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.missingPet.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pet_type_id">{{ trans('cruds.missingPet.fields.pet_type') }}</label>
                <select class="form-control select2 {{ $errors->has('pet_type') ? 'is-invalid' : '' }}" name="pet_type_id" id="pet_type_id">
                    @foreach($pet_types as $id => $entry)
                        <option value="{{ $id }}" {{ (old('pet_type_id') ? old('pet_type_id') : $missingPet->pet_type->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('pet_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pet_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.missingPet.fields.pet_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="missing_date">{{ trans('cruds.missingPet.fields.missing_date') }}</label>
                <input class="form-control date {{ $errors->has('missing_date') ? 'is-invalid' : '' }}" type="text" name="missing_date" id="missing_date" value="{{ old('missing_date', $missingPet->missing_date) }}">
                @if($errors->has('missing_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('missing_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.missingPet.fields.missing_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="missing_place">{{ trans('cruds.missingPet.fields.missing_place') }}</label>
                <input class="form-control {{ $errors->has('missing_place') ? 'is-invalid' : '' }}" type="text" name="missing_place" id="missing_place" value="{{ old('missing_place', $missingPet->missing_place) }}">
                @if($errors->has('missing_place'))
                    <div class="invalid-feedback">
                        {{ $errors->first('missing_place') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.missingPet.fields.missing_place_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="receiving_place">{{ trans('cruds.missingPet.fields.receiving_place') }}</label>
                <input class="form-control {{ $errors->has('receiving_place') ? 'is-invalid' : '' }}" type="text" name="receiving_place" id="receiving_place" value="{{ old('receiving_place', $missingPet->receiving_place) }}">
                @if($errors->has('receiving_place'))
                    <div class="invalid-feedback">
                        {{ $errors->first('receiving_place') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.missingPet.fields.receiving_place_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="note">{{ trans('cruds.missingPet.fields.note') }}</label>
                <textarea class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" name="note" id="note">{{ old('note', $missingPet->note) }}</textarea>
                @if($errors->has('note'))
                    <div class="invalid-feedback">
                        {{ $errors->first('note') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.missingPet.fields.note_helper') }}</span>
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