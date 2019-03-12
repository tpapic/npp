<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies\FlightPolicy;
use App\Flight;
use App\City;
use App\Policies\CityPolicy;
use App\TravelClass;
use App\Policies\TravelClassPolicy;
use App\Fellow;
use App\Policies\FellowPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        City::class => CityPolicy::class,
        Flight::class => FlightPolicy::class,
        TravelClass::class => TravelClassPolicy::class,
        Fellow::class => FellowPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
