<?php

namespace App\Api\V1\Controllers\Auth;

use Tymon\JWTAuth\JWTAuth;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use App\User;
use App\Role;
use Auth;

class Local extends AuthCore {

  public function validationRules()
  {
    return [
            'social_provider_id' => 'required|min:1|max:3',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'date_of_birth' => 'required|date',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'package_id' => 'required|min:1|max:3'
    ];
  }

  public function registration(Request $request) {
    parent::registration($request);

    $request->merge([
        'role_id' => Role::getDefault()->id,
        'verified_token' => $this->generateVerifiedToken(),
        'social_provider_id' => $this->socialNetworkId,
        'verified' => 1
    ]);

    $data = $request->only([
        'social_provider_id',  'first_name', 'last_name', 'date_of_birth',
        'email', 'password', 'role_id', 'package_id', 'role_id',
        'verified_token', 'verified']);

    $userExits = $this->userExists($data);

    if(!$userExits['success']) {
        return $userExits;
    }

    $user = User::create($data);

    return ['success' => true];
  }

  public function login(Request $request, JWTAuth $JWTAuth) {
    $credentials = $request->only(['email', 'password']);

    try {
      $token = $JWTAuth->attempt($credentials);

      if(!$token) {
          return ['success' => false, 'reason' => 'user_not_found'];
      }

    } catch (JWTException $e) {
        throw new HttpException(500);
    }

    $requestUser = Auth::guard()->user();

    $userRoleActions = $requestUser->roles->actions()->wherePivot('is_allowed', 1)->get();

    return response()
      ->json([
          'success' => true,
          'token' => $token,
          'user' => [
              'name' => $requestUser->full_name,
              'email' => $requestUser->email,
              'role' => $requestUser->roles,
              'actions' => $userRoleActions
          ],
          'expires_in' => Auth::guard('api')->factory()->getTTL() * 60
      ]);
  }

}