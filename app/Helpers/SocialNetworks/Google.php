<?php

namespace App\Helpers\SocialNetworks;

use Tymon\JWTAuth\JWTAuth;
use Illuminate\Http\Request;
use Faker\Generator as Faker;
use App\User;
use Auth;

class Google extends SocialNetwork {

  public function register($request) {
      
      $data = factory(User::class, 'networks')->make();
      $data = $data->toArray();

      $socialId = $request->input('social_provider_id');
      $packageId = $request->input('package_id');

      $data['social_provider_id'] = $socialId;
      $data['package_id'] = $packageId;

      $user = User::where('social_provider_id', $data['social_provider_id'])
                    ->where('email', $data['email'])
                    ->first();

      if(isset($user) && !empty($user)) {
          return $user;
      }

      $user = User::create($data);

      return $user;
  }

  public function logIn($request, JWTAuth $JWTAuth) {
    if($user = $this->register($request)) {
      $token = $JWTAuth->fromUser($user);
      Auth::login($user);
      $userRoleActions = Auth::user()->roles->actions()->wherePivot('is_allowed', 1)->get();

      return response()
        ->json([
            'success' => true,
            'token' => $token,
            'user' => [
                'name' => Auth::user()->full_name,
                'email' => Auth::user()->email,
                'role' => Auth::user()->roles,
                'actions' => $userRoleActions
            ],
            'expires_in' => Auth::guard()->factory()->getTTL() * 60
        ]);
    }
  }

  public function logOut() {
      return true;
  }
}