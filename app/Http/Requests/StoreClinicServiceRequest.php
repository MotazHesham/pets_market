<?php

namespace App\Http\Requests;

use App\Models\ClinicService;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreClinicServiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('clinic_service_create');
    }

    public function rules()
    {
        return [
            'clinic_id' => [
                'required',
                'integer',
            ],
            'name' => [
                'string',
                'required',
            ],
            'photo' => [
                'required',
            ],
            'short_description' => [
                'string',
                'required',
            ],
        ];
    }
}
