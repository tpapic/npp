<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class PictureTest extends TestCase
{
    /** @test */
    public function auth_user_successfuly_store_picture()
    {
        $filename = base_path('tests/Unit/data/pictureData.json');
        $dataFile = file_get_contents($filename);
        $data = json_decode($dataFile, true);

        $response = $this->jsonAuth('POST', '/api/pictures', $data);

        $response->assertJson([
            'success' => true
        ]);
    }
}
