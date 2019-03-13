<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\User;

/**
 * Class TestCase
 * @package Tests
 */
abstract class TestCase extends BaseTestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * @var
     */
    protected $user;
    /**
     * @var
     */
    protected $token;

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();
        return $app;
    }

    /**
     * Refresh database before every test.
     */
    public function setUp()
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
        $this->seed();
    }

    /**
     * Gets a token and logins a user.
     */
    public function login()
    {
        $this->user = factory(User::class, 'networks')->create();

        $this->token = JWTAuth::fromUser($this->user);
        JWTAuth::setToken($this->token);
    }

    /**
     * @param $method
     * @param $uri
     * @param array $data
     * @param array $headers
     * @return \Illuminate\Foundation\Testing\TestResponse
     */
    public function jsonAuth($method, $uri, $data = [], $headers = [])
    {
        if (!$this->user) {
            $this->login();
        }

        if ($this->user) {
            $tokenHeader = 'Bearer ' . $this->token;
            $headers['Authorization'] = $tokenHeader;
        }
        return $this->json($method, $uri, $data, $headers);
    }
}
