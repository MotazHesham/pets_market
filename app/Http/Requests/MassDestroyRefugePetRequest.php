<?php

namespace App\Http\Requests;

use App\Models\RefugePet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRefugePetRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('refuge_pet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:refuge_pets,id',
        ];
    }
}
