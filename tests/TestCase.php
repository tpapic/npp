<?php

namespace App;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

abstract class TestCase extends BaseTestCase
{
    use DatabaseMigrations;
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    protected $user;
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
        $this->seed();
    }

    /**
     * Gets a token and logins a user.
     */
    public function login()
    {
        $this->user = factory(User::class)->create();

        $this->token = JWTAuth::fromUser($this->user);

        $login = [
            'email' => $this->user->email,
            'password' => 'secret'
        ];
        $this->token = JWTAuth::attempt($login);
    }

    /**
     * json() wrapper which also sends an auth token.
     */
    public function jsonAuth($method, $uri, $data = [], $headers = [])
    {
        if ($this->user) {
            $tokenHeader = 'Bearer ' . $this->token;
            $headers['Authorization'] = $tokenHeader;
        }
        return $this->json($method, $uri, $data, $headers);
    }
}
