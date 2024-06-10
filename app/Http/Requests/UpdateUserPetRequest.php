<?php

namespace App\Http\Requests;

use App\Models\UserPet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserPetRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_pet_edit');
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
            'gender' => [
                'required',
            ],
        ];
    }
}
