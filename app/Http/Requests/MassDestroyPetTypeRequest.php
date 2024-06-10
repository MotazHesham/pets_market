<?php

namespace App\Http\Requests;

use App\Models\PetType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPetTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pet_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:pet_types,id',
        ];
    }
}
