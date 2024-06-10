<?php

namespace App\Http\Requests;

use App\Models\Product;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'main_photo' => [
                'required',
            ],
            'photos' => [
                'required',
            ],
            'description' => [
                'required',
            ],
            'details' => [
                'required',
            ],
            'short_details' => [
                'required',
            ],
            'video_link' => [
                'string',
                'nullable',
            ],
            'meta_title' => [
                'string',
                'nullable',
            ],
            'published' => [
                'required',
            ],
            'featured' => [
                'required',
            ],
            'current_stock' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
