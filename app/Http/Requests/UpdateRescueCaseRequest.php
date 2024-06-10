<?php

namespace App\Http\Requests;

use App\Models\RescueCase;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRescueCaseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('rescue_case_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'address' => [
                'string',
                'required',
            ],
            'photos' => [
                'array',
            ],
            'pet_type_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
