<?php

namespace App\Http\Requests;

use App\Models\MissingPet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMissingPetRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('missing_pet_edit');
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
            'missing_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'missing_place' => [
                'string',
                'nullable',
            ],
            'receiving_place' => [
                'string',
                'nullable',
            ],
        ];
    }
}
