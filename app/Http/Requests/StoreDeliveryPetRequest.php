<?php

namespace App\Http\Requests;

use App\Models\DeliveryPet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDeliveryPetRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('delivery_pet_create');
    }

    public function rules()
    {
        return [
            'num_of_pets' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'name' => [
                'string',
                'nullable',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
        ];
    }
}
