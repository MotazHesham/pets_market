<?php

namespace App\Http\Requests;

use App\Models\Refuge;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRefugeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('refuge_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:refuges,id',
        ];
    }
}
