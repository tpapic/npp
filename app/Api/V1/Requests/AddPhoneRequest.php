<?php

namespace App\Api\V1\Requests;

use Config;
use Dingo\Api\Http\FormRequest;

class AddPhoneRequest extends FormRequest
{
    public function rules()
    {
        return Config::get('boilerplate.add_phone.validation_rules');
    }

    public function authorize()
    {
        return true;
    }
}
