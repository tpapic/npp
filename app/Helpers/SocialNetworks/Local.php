<?php

namespace App\Helpers\SocialNetworks;

use Tymon\JWTAuth\JWTAuth;
use Illuminate\Http\Request;
use App\Api\V1\Requests\SignUpRequest;
use App\User;
use App\Role;

class Local extends SocialNetwork {

  public function register($request) {

    $request->merge([
        'role_id' => Role::getDefault()->id,
        'verified_token' => $this->generateVerifiedToken(),
        'social_provider_id' => $this->socialNetworkId,
        'verified' => 1
    ]);

    $data = $request->only([
        'email', 'password', 'role_id', 'date_of_birth', 'gender_id', 'first_name', 
        'last_name', 'verified_token', 'social_provider_id', 'verified' ,'package_id']);

    $matches = User::where('social_provider_id', $data['social_provider_id'])
                    ->where('email', $data['email'])
                    ->count();

    if($matches > 0) {
        return ['success' => false, 'reason' => 'The email has already been taken with that provider'];
    }

    $user = User::create($data);

    return ['success' => true, 'user' => $user];
  }

  public function logIn($request, JWTAuth $JWTAuth) {
    $data = $this->register($request);
    if($data['success']) {
      $token = $JWTAuth->fromUser($data['user']);
        return response()->json([
            'success' => true,
            'token' => $token
        ], 201);
    } else {
        return $data;
    }
  }

  public function logOut() {
      return true;
  }
}