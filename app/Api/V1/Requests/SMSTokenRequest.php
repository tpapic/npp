<?php

namespace App\Api\V1\Requests;

use Config;
use Dingo\Api\Http\FormRequest;

class SMSTokenRequest extends FormRequest
{
    public function rules()
    {
        return Config::get('boilerplate.verify_sms_token.validation_rules');
    }

    public function authorize()
    {
        return true;
    }
}
