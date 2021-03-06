<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes(['middleware' => ['jwt.auth']]);

        /*
         * Authenticate the user's personal channel...
         */
        Broadcast::channel('App.User.{userId}', function ($user, $userId) {
		//dd($userId);
            return (int) $user->id === (int) $userId;
	    //return true;
        });
    }
}
