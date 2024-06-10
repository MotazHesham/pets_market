<?php

namespace App\Http\Requests;

use App\Models\Volunteer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyVolunteerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('volunteer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:volunteers,id',
        ];
    }
}
