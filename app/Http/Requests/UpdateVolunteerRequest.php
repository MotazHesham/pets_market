<?php

namespace App\Http\Requests;

use App\Models\Volunteer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVolunteerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('volunteer_edit');
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
            'experience' => [
                'string',
                'nullable',
            ],
        ];
    }
}
