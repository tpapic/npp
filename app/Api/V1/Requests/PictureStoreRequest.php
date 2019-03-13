<?php

namespace App\Api\V1\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Config;

class PictureStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'filename' => 'required|string',
            'description' => 'required|string',
            'hashtags' => 'present|string',
            'filters' => 'present|array',
            'file' => 'required'
        ];
    }
}