<?php

namespace App\Helpers\SocialNetworks;

use App\Api\V1\Requests\SignUpRequest;
use Tymon\JWTAuth\JWTAuth;

abstract class SocialNetwork
{
    protected $socilaNetworkId;

    public function __construct($id)
    {
        $this->socialNetworkId = $id;
    }

    public abstract function register($request);

    public abstract function logIn($request, JWTAuth $JWTAuth);

    public abstract function logOut();

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