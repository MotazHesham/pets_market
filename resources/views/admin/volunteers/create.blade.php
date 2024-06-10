@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.volunteer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.volunteers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="first_name">{{ trans('cruds.volunteer.fields.first_name') }}</label>
                <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ old('first_name', '') }}">
                @if($errors->has('first_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('first_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.volunteer.fields.first_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="last_name">{{ trans('cruds.volunteer.fields.last_name') }}</label>
                <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ old('last_name', '') }}">
                @if($errors->has('last_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('last_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.volunteer.fields.last_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.volunteer.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.volunteer.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.volunteer.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.volunteer.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.volunteer.fields.gender') }}</label>
                <select class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" id="gender">
                    <option value disabled {{ old('gender', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Volunteer::GENDER_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('gender', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('gender'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gender') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.volunteer.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.volunteer.fields.age') }}</label>
                <select class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" name="age" id="age">
                    <option value disabled {{ old('age', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Volunteer::AGE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('age', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('age'))
                    <div class="invalid-feedback">
                        {{ $errors->first('age') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.volunteer.fields.age_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="experience">{{ trans('cruds.volunteer.fields.experience') }}</label>
                <input class="form-control {{ $errors->has('experience') ? 'is-invalid' : '' }}" type="text" name="experience" id="experience" value="{{ old('experience', '') }}">
                @if($errors->has('experience'))
                    <div class="invalid-feedback">
                        {{ $errors->first('experience') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.volunteer.fields.experience_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.volunteer.fields.fields') }}</label>
                @foreach(App\Models\Volunteer::FIELDS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('fields') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="fields_{{ $key }}" name="fields" value="{{ $key }}" {{ old('fields', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="fields_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('fields'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fields') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.volunteer.fields.fields_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.volunteer.fields.period_time') }}</label>
                <select class="form-control {{ $errors->has('period_time') ? 'is-invalid' : '' }}" name="period_time" id="period_time">
                    <option value disabled {{ old('period_time', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Volunteer::PERIOD_TIME_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('period_time', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('period_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('period_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.volunteer.fields.period_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="note">{{ trans('cruds.volunteer.fields.note') }}</label>
                <textarea class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" name="note" id="note">{{ old('note') }}</textarea>
                @if($errors->has('note'))
                    <div class="invalid-feedback">
                        {{ $errors->first('note') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.volunteer.fields.note_helper') }}</span>
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