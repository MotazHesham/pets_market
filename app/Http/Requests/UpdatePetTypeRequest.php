<?php

namespace App\Http\Requests;

use App\Models\PetType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePetTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pet_type_edit');
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
