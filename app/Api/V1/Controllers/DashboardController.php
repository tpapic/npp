<?php

namespace App\Api\V1\Controllers;

use App\User;
use App\Picture;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends AppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $package = $user->package;

        $countUploadedPictures = Picture::where('user_id', $user->id)->count();
        
        return ['success' => true, 'data' => compact(['user', 'package', 'countUploadedPictures'])];
    }
}
