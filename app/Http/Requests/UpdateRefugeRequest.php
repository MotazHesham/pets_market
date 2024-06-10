<?php

namespace App\Http\Requests;

use App\Models\Refuge;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRefugeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('refuge_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'logo' => [
                'required',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
        ];
    }
}
