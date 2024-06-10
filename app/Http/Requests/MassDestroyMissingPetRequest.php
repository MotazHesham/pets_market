<?php

namespace App\Http\Requests;

use App\Models\MissingPet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMissingPetRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('missing_pet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:missing_pets,id',
        ];
    }
}
