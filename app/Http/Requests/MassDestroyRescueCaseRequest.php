<?php

namespace App\Http\Requests;

use App\Models\RescueCase;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRescueCaseRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('rescue_case_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:rescue_cases,id',
        ];
    }
}
