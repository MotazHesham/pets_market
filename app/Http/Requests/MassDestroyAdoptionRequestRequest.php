<?php

namespace App\Http\Requests;

use App\Models\AdoptionRequest;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAdoptionRequestRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('adoption_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:adoption_requests,id',
        ];
    }
}
