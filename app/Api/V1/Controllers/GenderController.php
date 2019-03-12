<?php

namespace App\Api\V1\Controllers;

use App\Api\V1\Requests\StoreGender;
use App\Gender;
use Dingo\Api\Auth\Auth;
use Illuminate\Http\Request;


class GenderController extends AppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genders = Gender::paginate(20);

        $response = [
            'genders' => $genders,
            'success' => true
        ];

        return $response;
    }
}
