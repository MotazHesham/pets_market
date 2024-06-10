<?php

namespace App\Http\Requests;

use App\Models\Clinic;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateClinicRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('clinic_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'clinic_name' => [
                'string',
                'required',
            ],
            'short_description' => [
                'string',
                'nullable',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
            'pet_types.*' => [
                'integer',
            ],
            'pet_types' => [
                'required',
                'array',
            ],
        ];
    }
}
