@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.volunteer.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.volunteers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteer.fields.id') }}
                        </th>
                        <td>
                            {{ $volunteer->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteer.fields.first_name') }}
                        </th>
                        <td>
                            {{ $volunteer->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteer.fields.last_name') }}
                        </th>
                        <td>
                            {{ $volunteer->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteer.fields.phone') }}
                        </th>
                        <td>
                            {{ $volunteer->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteer.fields.email') }}
                        </th>
                        <td>
                            {{ $volunteer->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteer.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\Volunteer::GENDER_SELECT[$volunteer->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteer.fields.age') }}
                        </th>
                        <td>
                            {{ App\Models\Volunteer::AGE_SELECT[$volunteer->age] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteer.fields.experience') }}
                        </th>
                        <td>
                            {{ $volunteer->experience }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteer.fields.fields') }}
                        </th>
                        <td>
                            {{ App\Models\Volunteer::FIELDS_RADIO[$volunteer->fields] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteer.fields.period_time') }}
                        </th>
                        <td>
                            {{ App\Models\Volunteer::PERIOD_TIME_SELECT[$volunteer->period_time] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.volunteer.fields.note') }}
                        </th>
                        <td>
                            {{ $volunteer->note }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.volunteers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection