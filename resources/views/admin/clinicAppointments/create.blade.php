@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.clinicAppointment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.clinic-appointments.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="client_name">{{ trans('cruds.clinicAppointment.fields.client_name') }}</label>
                <input class="form-control {{ $errors->has('client_name') ? 'is-invalid' : '' }}" type="text" name="client_name" id="client_name" value="{{ old('client_name', '') }}" required>
                @if($errors->has('client_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clinicAppointment.fields.client_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.clinicAppointment.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}" required>
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clinicAppointment.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.clinicAppointment.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clinicAppointment.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.clinicAppointment.fields.address') }}</label>
                <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address">{{ old('address') }}</textarea>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clinicAppointment.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.clinicAppointment.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date') }}" required>
                @if($errors->has('date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clinicAppointment.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="time">{{ trans('cruds.clinicAppointment.fields.time') }}</label>
                <input class="form-control timepicker {{ $errors->has('time') ? 'is-invalid' : '' }}" type="text" name="time" id="time" value="{{ old('time') }}" required>
                @if($errors->has('time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clinicAppointment.fields.time_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="age">{{ trans('cruds.clinicAppointment.fields.age') }}</label>
                <input class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" type="number" name="age" id="age" value="{{ old('age', '') }}" step="1" required>
                @if($errors->has('age'))
                    <div class="invalid-feedback">
                        {{ $errors->first('age') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clinicAppointment.fields.age_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="note">{{ trans('cruds.clinicAppointment.fields.note') }}</label>
                <textarea class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" name="note" id="note">{{ old('note') }}</textarea>
                @if($errors->has('note'))
                    <div class="invalid-feedback">
                        {{ $errors->first('note') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clinicAppointment.fields.note_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="service_id">{{ trans('cruds.clinicAppointment.fields.service') }}</label>
                <select class="form-control select2 {{ $errors->has('service') ? 'is-invalid' : '' }}" name="service_id" id="service_id" required>
                    @foreach($services as $id => $entry)
                        <option value="{{ $id }}" {{ old('service_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('service'))
                    <div class="invalid-feedback">
                        {{ $errors->first('service') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clinicAppointment.fields.service_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="clinic_id">{{ trans('cruds.clinicAppointment.fields.clinic') }}</label>
                <select class="form-control select2 {{ $errors->has('clinic') ? 'is-invalid' : '' }}" name="clinic_id" id="clinic_id" required>
                    @foreach($clinics as $id => $entry)
                        <option value="{{ $id }}" {{ old('clinic_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('clinic'))
                    <div class="invalid-feedback">
                        {{ $errors->first('clinic') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clinicAppointment.fields.clinic_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="pet_type_id">{{ trans('cruds.clinicAppointment.fields.pet_type') }}</label>
                <select class="form-control select2 {{ $errors->has('pet_type') ? 'is-invalid' : '' }}" name="pet_type_id" id="pet_type_id" required>
                    @foreach($pet_types as $id => $entry)
                        <option value="{{ $id }}" {{ old('pet_type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('pet_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pet_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clinicAppointment.fields.pet_type_helper') }}</span>
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