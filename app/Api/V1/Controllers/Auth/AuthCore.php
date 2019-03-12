<?php

namespace App\Api\V1\Controllers\Auth;

use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Http\Request;
use Validator;
use App\User;
use Auth;

abstract class AuthCore
{
    protected $socilaNetworkId;

    public function __construct($id)
    {
        $this->socialNetworkId = $id;
    }

    public abstract function validationRules();

    public function registration(Request $request) {
      $this->validate($request->input());
    }

    public abstract function login(Request $request, JWTAuth $JWTAuth);

    public function logout() {
      Auth::logout();
      return ['success' => true];
    }

    protected function validate($data) {

      $validator = Validator::make($data, $this->validationRules());

      if ($validator->fails()) {
        throw ValidationException::withMessages($validator->errors()->toArray());
      }
    }

    protected function userExists($data) {
        $matches = User::where('social_provider_id', $data['social_provider_id'])
                    ->where('email', $data['email'])
                    ->count();

        if($matches > 0) {
            return ['success' => false, 'reason' => 'The email has already been taken with that provider'];
        }

        return ['success' => true];
    }

    protected function generateVerifiedToken($length = 30)
    {
        $characters = '0123456789abcdefghjkmnopqrstuvwxyzABCDEFGHJKMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}