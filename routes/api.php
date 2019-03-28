<?php

use Dingo\Api\Routing\Router;
use App\Api\V1\Controllers\UserController;
use App\Api\V1\Controllers\DashboardController;
use App\Api\V1\Controllers\PictureController;
use App\Exceptions\GeneralExceptionHandler;

/** Register custom exception handling */
new GeneralExceptionHandler();

/** @var Router $api */
$api = app(Router::class);

$api->version('v1', function (Router $api) {

    $api->group(['prefix' => 'auth'], function(Router $api) {
        $api->post('registration', 'App\\Api\\V1\\Controllers\\AuthController@registration');
        $api->post('login', 'App\\Api\\V1\\Controllers\\AuthController@login');
        $api->post('logout', 'App\\Api\\V1\\Controllers\\AuthController@logout');
        
    });

    $api->group(['middleware' => 'jwt.auth'], function(Router $api) {
        $api->get('protected', function() {
            return response()->json([
                'message' => 'Access to protected resources granted! You are seeing this text as you provided the token correctly.'
            ]);
        });

        $api->get('refresh', [
            'middleware' => 'jwt.refresh',
            function() {
                return response()->json([
                    'message' => 'By accessing this endpoint, you can refresh your access token at each request. Check out this response headers!'
                ]);
            }
        ]);

        $api->get('auth/me', 'App\\Api\\V1\\Controllers\\UserController@me');


        /* User */
        $api->group(['prefix' => 'users'], function () use ($api) {
            $api->put('/', UserController::class . '@update');
            $api->put('/change_password', UserController::class . '@changePassword');
        });

        /* Picture */
        $api->group(['prefix' => 'pictures'], function () use ($api) {
            $api->get('/', PictureController::class . '@index');
            $api->get('/{id}', PictureController::class . '@show');
            $api->post('/', PictureController::class . '@add');
            $api->put('/{id}', PictureController::class . '@edit');
        });

        /* Dashboard */
        $api->group(['prefix' => 'dashboard'], function () use ($api) {
            $api->get('/', DashboardController::class . '@index');
        });

    });

    $api->get('ping', function () {
        try {
            App\User::first();
        } catch(\Exception $e) {
            return response()->json([
                'success' => false,
                'reason' => 'error'
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => 'pong'
        ]);
    });

    $api->get('/all_pictures', PictureController::class . '@allPictures');
    $api->get('/picture/{id}', PictureController::class . '@show');
    $api->post('/download', PictureController::class . '@download');
    $api->get('/download_file/{file}', PictureController::class . '@downloadFile');


});
