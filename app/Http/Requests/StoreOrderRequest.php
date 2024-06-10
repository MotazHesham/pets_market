<?php

namespace App\Http\Requests;

use App\Models\Order;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_create');
    }

    public function rules()
    {
        return [
            'order_num' => [
                'string',
                'nullable',
            ],
            'first_name' => [
                'string',
                'nullable',
            ],
            'last_name' => [
                'string',
                'nullable',
            ],
            'phone_number' => [
                'string',
                'nullable',
            ],
            'city' => [
                'string',
                'nullable',
            ],
            'total_cost' => [
                'required',
            ],
            'payment_type' => [
                'required',
            ],
            'payment_status' => [
                'required',
            ],
            'discount_code' => [
                'string',
                'nullable',
            ],
        ];
    }
}
