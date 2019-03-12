<?php

namespace App\Api\V1\Controllers;

use Auth;
use App\Api\V1\Requests\UpdateUser;
use App\User;
use App\Queries\UserQuery;
use Illuminate\Http\Request;
use App\Api\V1\Requests\AddPhoneRequest;
use App\Api\V1\Requests\SMSTokenRequest;
use App\Fellow;
use App\Bid;
use App\Api\V1\Requests\ChangePassUser;
use Illuminate\Support\Facades\Hash;
use App\Api\V1\Requests\StoreCreditCard;
use Stripe\Customer;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentConfirmationEmail;
use App\Mail\MobileConfirmationEmail;

/**
 * @resource User
 *
 * User controller
 *
 * User controller is used to dispatch, store, show,
 * update information about users
 */
class UserController extends AppController
{

    public function me()
    {
        return response()->json([
            'success' => true,
            'user' => User::findOrFail(Auth::id()),
            'message' => 'user_loaded'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Api\V1\Requests\StoreUser  $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request)
    {
        $response = ['success' => false];
        $data = $request->all();

        $user = Auth::user();

        if (isset($data['email'])) {
            unset($data['email']);
        }

        if ($user->update($data)) {
            $fellow = Fellow::where('is_registered_user', '=', 1)->where('user_id', '=', Auth::id())->first();
            if ($fellow->update($data)) {
                $response['success'] = true;
                return $response;
            }
        }

        return $response;
    }

    public function changePassword(ChangePassUser $request) 
    {
        $response = ['success' => false];
        $data = $request->all();

        $user = Auth::user();

        if ($user->update($data)) {
            $response['success'] = true;
            return $response;
        }

        return $response;
    }


}
