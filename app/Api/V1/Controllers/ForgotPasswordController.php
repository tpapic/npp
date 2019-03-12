<?php

namespace App\Api\V1\Controllers;

use App\User;
use Illuminate\Support\Facades\Password;
use App\Api\V1\Requests\ForgotPasswordRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Carbon;
use App\Notifications\MobileResetPasswordNotification;
use DB;
use Illuminate\Support\Facades\Hash;
use App\PasswordReset;

class ForgotPasswordController extends AppController
{
    public function sendResetEmail(ForgotPasswordRequest $request)
    {
        $user = User::where('email', '=', $request->get('email'))->first();

        if(!$user) {
            throw new NotFoundHttpException();
        }

        $broker = $this->getPasswordBroker();
        $sendingResponse = $broker->sendResetLink($request->only('email'));

        if($sendingResponse !== Password::RESET_LINK_SENT) {
            throw new HttpException(500);
        }

        return response()->json([
            'success' => true,
        ], 200);
    }

    public function sendMobileResetEmail(ForgotPasswordRequest $request) {

        $user = User::where('email', '=', $request->get('email'))->first();

        if (!$user) {
            throw new NotFoundHttpException();
        }

        $code = $this->randomString();
        $token = Hash::make($code);

        PasswordReset::where('email', $user->email)->delete();

        $passReset = PasswordReset::create([
            'email' => $user->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        $user->notify(new MobileResetPasswordNotification($code));

        return response()->json([
            'success' => true,
        ], 200);

    }

    private function randomString($length = 6)
    {
        $characters = '123456789abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    private function getPasswordBroker()
    {
        return Password::broker();
    }
}
