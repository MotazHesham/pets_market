<?php

namespace App\Http\Requests;

use App\Models\Setting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('setting_edit');
    }

    public function rules()
    {
        return [
            'site_name' => [
                'string',
                'nullable',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'twitter' => [
                'string',
                'nullable',
            ],
            'facebook' => [
                'string',
                'nullable',
            ],
            'googleplus' => [
                'string',
                'nullable',
            ],
            'instagram' => [
                'string',
                'nullable',
            ],
            'author_seo' => [
                'string',
                'nullable',
            ],
            'sitemap_link_seo' => [
                'string',
                'nullable',
            ],
            'count_stores' => [
                'string',
                'nullable',
            ],
            'count_pets' => [
                'string',
                'nullable',
            ],
            'count_tweets' => [
                'string',
                'nullable',
            ],
            'count_products' => [
                'string',
                'nullable',
            ],
        ];
    }
}
