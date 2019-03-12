<?php

namespace App\Api\V1\Controllers;

use Symfony\Component\HttpKernel\Exception\HttpException;
use Tymon\JWTAuth\JWTAuth;
use App\Api\V1\Requests\LoginRequest;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Api\V1\Requests\SocialLoginRequest;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Auth;
use App\User;
use Socialite;
use Tymon\JWTAuth\Facades\JWTAuth as JWTAuthForSocial;
use Carbon\Carbon;
use PhpParser\Node\Stmt\Return_;
use Google_Client;
use Google_Service_People;

class LoginController extends AppController
{
    /**
     * Log the user in
     *
     * @param LoginRequest $request
     * @param JWTAuth $JWTAuth
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request, JWTAuth $JWTAuth)
    {
        $credentials = $request->only(['email', 'password']);

        try {
            $token = Auth::guard()->attempt($credentials);

            if(!$token) {
                throw new AccessDeniedHttpException();
            }

        } catch (JWTException $e) {
            throw new HttpException(500);
        }

        if(!Auth::user()->verified) {
            return ['success' =>'false', 'reason' => 'user_is_not_verified'];
        }

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


    public function facebookLogin(SocialLoginRequest $request)
    {
        $token = $request->input('token');

        $providerId = 2; //facebook

        $user = Socialite::driver('facebook')->fields([
            'first_name', 'last_name', 'email'
        ])->userFromToken($token);
        // dd($user);
        $data['first_name'] = $user->user['first_name'];
        $data['last_name'] = $user->user['last_name'];
        $data['email'] = $user->email;
        $data['social_provider_id'] = $providerId; //facebook
        $data['role_id'] = 2; //user
        $data['verified'] = 1;

        $authUser = $this->firstOrCreate($data, $providerId);

        $token = Auth::login($authUser);

        return [
            'success' => true,
            'token' => $token,
            'user' => [
                'id' => $authUser->id,
                'name' => $authUser->full_name,
                'email' => $authUser->email
            ],
            'expires_in' => Auth::guard()->factory()->getTTL() * 60
        ];

    }

    public function googleLogin(SocialLoginRequest $request) {
        $token = $request->input('token');

        $client = new Google_Client([
            'client_id' => \Config::get('services')['google']['client_id'],
            'client_secret' => \Config::get('services')['google']['client_secret']
        ]);

        $data = $client->fetchAccessTokenWithAuthCode($token);

        if (!isset($data['access_token']) || empty($data['access_token'])) {
            return ['success' => false, 'reason' => 'no_access_token_provided'];
        }

        $user = Socialite::driver('google')->scopes(['profile','email'])->userFromToken($data['access_token']);

        $providerId = 3; //google

        $data = [
            'first_name' => $user->user['name']['givenName'],
            'last_name' => $user->user['name']['familyName'],
            'date_of_birth' => null,
            'email' => $user->email,
            'social_provider_id' => $providerId, // google
            'role_id' => 4, //user
            'verified' => 1
        ];

        $authUser = $this->firstOrCreate($data, $providerId);

        $token = Auth::login($authUser);

        return [
            'success' => true,
            'token' => $token,
            'user' => [
                'id' => $authUser->id,
                'name' => $authUser->full_name,
                'email' => $authUser->email
            ],
            'expires_in' => Auth::guard()->factory()->getTTL() * 60
        ];
    }

    private function firstOrCreate($data, $providerId) {
        // dd($user);
        $authUser = User::where('social_provider_id', $providerId)
                        ->where('email', $data['email'])
                        ->first();

        if ($authUser) {
            return $authUser;
        }

        $user = User::create($data);

        $data['user_id'] = $user->id;
        $data['is_registered_user'] = 1;

        return $user;
    }
}
