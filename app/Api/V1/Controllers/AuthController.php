<?php

namespace App\Api\V1\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use App\Api\V1\Controllers\Auth\Local;
use App\Api\V1\Controllers\Auth\Github;
use App\Api\V1\Controllers\Auth\Google;
use Auth;

class AuthController extends Controller
{
  public function registration(Request $request, JWTAuth $JWTAuth)
  {
        $authId = $request->input('social_provider_id');

        switch($authId) {
          case '1':
            $network = new Local(1);
          break;
          case '2':
            $network = new Github(2);
          break;
          case '3':
            $network = new Google(3);
          break;

          default:
            return ['success' => false, 'reason' => 'Wrong auth network'];
        }

        return $network->registration($request, $JWTAuth);
    }

  public function login(Request $request, JWTAuth $JWTAuth)
  {
        $authId = $request->input('social_provider_id');

        switch($authId) {
          case '1':
            $network = new Local(1);
          break;
          case '2':
            $network = new Github(2);
          break;
          case '3':
            $network = new Google(3);
          break;

          default:
            return ['success' => false, 'reason' => 'Wrong auth network'];
        }

        return $network->login($request, $JWTAuth);
    }

  public function logout(Request $request, JWTAuth $JWTAuth)
  {
      $user = Auth::user();

      if(!$user) {
        return ['success' => false, 'reason' => 'Wrong token'];
      }

      $authId = $user->auth_provider_id;

      switch($authId) {
        case '1':
          $network = new Local(1);
        break;
        case '2':
          $network = new Github(2);
        break;
        case '3':
            $network = new Google(3);
        break;

        default:
          return ['success' => false, 'reason' => 'Wrong auth network'];
      }

      return $network->logout();
    }
}
