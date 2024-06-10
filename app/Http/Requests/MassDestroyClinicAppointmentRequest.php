<?php

namespace App\Http\Requests;

use App\Models\ClinicAppointment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyClinicAppointmentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('clinic_appointment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:clinic_appointments,id',
        ];
    }
}
