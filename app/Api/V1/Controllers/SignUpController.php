<?php

namespace App\Api\V1\Controllers;

use App\User;
use Config;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Http\Request;
use App\Api\V1\Requests\SignUpRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmEmail;
use App\Fellow;
use App\Role;
use App\Helpers\SocialNetworks\Local;
use App\Helpers\SocialNetworks\Github;
use App\Helpers\SocialNetworks\Google;

class SignUpController extends AppController
{
    public function signUp(Request $request, JWTAuth $JWTAuth)
    {
        $socialId = $request->input('social_provider_id');
        if($socialId == '1') {
            $network = new Local(1);
        } else if($socialId == '2') {
            $network = new Github(2);
        } else if($socialId == '3') {
            $network = new Google(3);
        } else {
            return ['success' => false, 'reason' => 'Wrong social network'];
        }

        return $network->logIn($request, $JWTAuth);
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

    public function confirmSignup($verifiedToken = null)
    {

        if (!$verifiedToken) {
            abort(403);
        }

        try {
            $user = User::where('verified_token', '=', $verifiedToken)->firstOrFail();
        } catch (\Exception $ex) {
            abort(403);
        }

        $user->verified = true;

        if ($user->save()) {
            return view('confirm_signup');
        }

        abort(403);
    }

    public function confirmEmail(Request $request)
    {
        $response = ['success' => false];

        $request->validate([
            'email' => 'required|email',
        ]);

        $data = $request->input();

        try {
            $user = User::where('email', '=', $data['email'])->first();
        } catch (ModelNotFoundException $ex) {
            $response['messages'] = trans('passwords.user');
            return $response;
        }

        if (!$user) {
            $response['messages'] = trans('passwords.user');
            return $response;
        }

        $user->verified_token = $this->generateVerifiedToken();

        if ($user->save()) {
            return ['success' => true, 'messages' => trans('passwords.confirm_email')];
        }

        return $response;

    }
}
