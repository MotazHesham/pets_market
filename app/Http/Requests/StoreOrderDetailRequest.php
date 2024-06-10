<?php

namespace App\Http\Requests;

use App\Models\OrderDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOrderDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_detail_create');
    }

    public function rules()
    {
        return [
            'order_id' => [
                'required',
                'integer',
            ],
            'variation' => [
                'string',
                'nullable',
            ],
            'quantity' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'price' => [
                'required',
            ],
            'total_cost' => [
                'required',
            ],
        ];
    }
}
