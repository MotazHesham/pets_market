@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.deliveryPet.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.delivery-pets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.deliveryPet.fields.id') }}
                        </th>
                        <td>
                            {{ $deliveryPet->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deliveryPet.fields.from_city') }}
                        </th>
                        <td>
                            {{ App\Models\DeliveryPet::FROM_CITY_SELECT[$deliveryPet->from_city] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deliveryPet.fields.to_city') }}
                        </th>
                        <td>
                            {{ App\Models\DeliveryPet::TO_CITY_SELECT[$deliveryPet->to_city] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deliveryPet.fields.num_of_pets') }}
                        </th>
                        <td>
                            {{ $deliveryPet->num_of_pets }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deliveryPet.fields.date') }}
                        </th>
                        <td>
                            {{ $deliveryPet->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deliveryPet.fields.pet_type') }}
                        </th>
                        <td>
                            {{ $deliveryPet->pet_type->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deliveryPet.fields.note') }}
                        </th>
                        <td>
                            {{ $deliveryPet->note }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deliveryPet.fields.name') }}
                        </th>
                        <td>
                            {{ $deliveryPet->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deliveryPet.fields.email') }}
                        </th>
                        <td>
                            {{ $deliveryPet->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deliveryPet.fields.phone') }}
                        </th>
                        <td>
                            {{ $deliveryPet->phone }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.delivery-pets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection