<?php

namespace App\Http\Requests;

use App\Models\PetType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePetTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pet_type_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
