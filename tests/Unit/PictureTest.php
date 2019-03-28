<?php

namespace Tests\Unit;

use Illuminate\Support\Collection;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Mockery;
use App\Picture;

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

    /** @test */
    public function auth_user_store_picture_with_not_exists_filters_failure()
    {
        $filename = base_path('tests/Unit/data/pictureData.json');
        $dataFile = file_get_contents($filename);
        $data = json_decode($dataFile, true);

        $data['filters'] = ['Not_exists_filter'];

        $response = $this->jsonAuth('POST', '/api/pictures', $data);

        $response->assertExactJson([
            'success' => false,
            'reason' => 'filter_not_found'
        ]);

    }

    /** @test */
    public function auth_user_store_picture_failure()
    {
        $data = [];

        $data['filters'] = ['Not_exists_filter'];

        $response = $this->jsonAuth('POST', '/api/pictures', $data);

        $response->assertJson([
            'success' => false
        ]);

        $response->assertJsonValidationErrors([
            'filename', 'description', 'hashtags', 'file'
        ]);

    }

    /** @test */
    public function auth_user_show_picture_success() {

        $this->login();
        $id = $this->addPictureToUser();

        $response = $this->jsonAuth('GET', '/api/pictures/' . $id);

        $response->assertJson([
            'success' => true
        ]);
    }

    /** @test */
    public function auth_user_download_picture_successfuly() {

        $filename = base_path('tests/Unit/data/pictureData.json');
        $dataFile = file_get_contents($filename);
        $data = json_decode($dataFile, true);

        $response = $this->jsonAuth('POST', '/api/pictures', $data);

        $responseData = json_decode($response->getContent(), true);

        $data = [
            'id' => $responseData['id'],
            'filters' => ['Rotate']
        ];

        $response = $this->call('POST', '/api/download', $data);

        $response->assertJson([
            'success' => true
        ]);
    }

    /** @test */
    public function auth_user_show_picture_failure() {

        $this->login();

        $response = $this->jsonAuth('GET', '/api/pictures/12312311');

        $response->assertExactJson([
            'success' => false,
            'reason' => 'model_not_found'
        ]);
    }

    /** @test */
    public function auth_user_edit_picture_failure() {

        $this->login();
        $id = $this->addPictureToUser();

        $filename = base_path('tests/Unit/data/pictureData.json');
        $dataFile = file_get_contents($filename);
        $data = json_decode($dataFile, true);

        $response = $this->jsonAuth('PUT', '/api/pictures/' . $id, $data);

        $response->assertExactJson([
            'success' => true
        ]);
    }





}
