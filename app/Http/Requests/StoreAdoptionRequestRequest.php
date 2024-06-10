<?php

namespace App\Http\Requests;

use App\Models\AdoptionRequest;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAdoptionRequestRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('adoption_request_create');
    }

    public function rules()
    {
        return [
            'first_name' => [
                'string',
                'nullable',
            ],
            'last_name' => [
                'string',
                'nullable',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
            'address' => [
                'string',
                'nullable',
            ],
        ];
    }
}
