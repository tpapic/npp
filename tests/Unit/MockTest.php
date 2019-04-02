<?php

namespace Tests\Unit;

use App\Helpers\Packages\PackageFactory;
use App\Package;
use App\Picture;
use Illuminate\Support\Collection;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Mockery;


class MockTest extends TestCase
{
    /** @test */
    public function mock_free_package_succesfully() {
        $mockUser = Mockery::spy(User::class)->makePartial();
        $mockUser->curent_daily_upload = 1;
        $mockUser->shouldReceive('save')->once()->andReturn(true);

        $mockPackage = Mockery::spy(Package::class)->makePartial();
        $mockPackage->max_upload_size = 10000;

        $package = PackageFactory::getPackageFilter('Free');
        $response = $package->packageFilter($mockPackage, $mockUser, 10);

        $this->assertTrue($response['success']);

    }

    /** @test */
    public function mock_gold_package_succesfully() {
        $mockUser = Mockery::spy(User::class)->makePartial();
        $mockUser->curent_daily_upload = 1;
        $mockUser->shouldReceive('save')->once()->andReturn(true);

        $mockPackage = Mockery::spy(Package::class)->makePartial();
        $mockPackage->max_upload_size = 10000;

        $package = PackageFactory::getPackageFilter('Gold');
        $response = $package->packageFilter($mockPackage, $mockUser, 10);

        $this->assertTrue($response['success']);

    }

    /** @test */
    public function mock_pro_package_succesfully() {
        $mockUser = Mockery::spy(User::class)->makePartial();
        $mockUser->curent_daily_upload = 1;
        $mockUser->shouldReceive('save')->once()->andReturn(true);

        $mockPackage = Mockery::spy(Package::class)->makePartial();
        $mockPackage->max_upload_size = 10000;

        $package = PackageFactory::getPackageFilter('Pro');
        $response = $package->packageFilter($mockPackage, $mockUser, 10);

        $this->assertTrue($response['success']);

    }
}