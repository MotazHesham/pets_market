<?php

namespace App\Http\Requests;

use App\Models\ProductReview;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductReviewRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_review_create');
    }

    public function rules()
    {
        return [
            'comment' => [
                'string',
                'nullable',
            ],
            'rate' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
