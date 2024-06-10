<?php

namespace App\Http\Requests;

use App\Models\RefugePet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRefugePetRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('refuge_pet_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'dob' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
