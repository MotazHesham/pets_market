<?php

namespace App\Http\Requests;

use App\Models\ClinicAppointment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateClinicAppointmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('clinic_appointment_edit');
    }

    public function rules()
    {
        return [
            'client_name' => [
                'string',
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
            ],
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'time' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'age' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'service_id' => [
                'required',
                'integer',
            ],
            'clinic_id' => [
                'required',
                'integer',
            ],
            'pet_type_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
