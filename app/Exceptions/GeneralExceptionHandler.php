<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Dingo\Api\Exception\Handler;

class GeneralExceptionHandler
{

    public function __construct()
    {
        app(Handler::class)->register(function (UnauthorizedHttpException $exception) {
            $headers = $exception->getHeaders();

            if(isset($headers['WWW-Authenticate']) &&
               $headers['WWW-Authenticate'] === 'not_allowed')
            {
              return response()->json([
                  'success' => false,
                  'reason' => 'not_allowed',
                  'messages' => trans('auth.not_allowed')
              ]);
            }

            return response()->json([
                'success' => false,
                'reason' => 'not_logged_in'
            ],  401);
        });

        app(Handler::class)->register(function (AuthenticationException $exception) {
            return response()->json([
                'success' => false,
                'reason' => 'not_logged_in'
            ], 401);
        });

        app(Handler::class)->register(function (AccessDeniedHttpException $exception) {
            return response()->json([
                'success' => false,
                'reason' => 'invalid_credentials',
                'messages' => trans('auth.invalid_credentials')
            ]);
        });

        app(Handler::class)->register(function (HttpException $exception) {
            if(method_exists($exception, 'getErrors')) {
                return response()->json([
                    'success' => false,
                    'reason' => 'validation_error',
                    'errors' => $exception->getErrors()->messages()
                ]);
            }
            
            return response()->json([
                'success' => false,
                'reason' => 'not_allowed',
                'messages' => trans('auth.not_allowed')
            ]);
        });

        app(Handler::class)->register(function (ModelNotFoundException $exception) {
            return response()->json([
                'success' => false,
                'reason' => 'model_not_found',
            ]);
        });

        app(Handler::class)->register(function (QueryException $exception) {
            return response()->json([
                'success' => false,
                'reason' => 'query_execution_failed',
                'code' => $exception->getCode()
            ]);
        });


        app(Handler::class)->register(function (NotFoundHttpException $exception) {
            return response()->json([
                'success' => false,
                'reason' => 'data_not_found'
            ]);
        });
    }

}
