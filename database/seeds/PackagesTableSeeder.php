<?php

use Illuminate\Database\Seeder;
use App\Package;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packages = [
            [
                'name' => 'Free', 
                'max_daily_upload_limit' => '2', 
                'curent_daily_upload_limit' => '2', 
                'max_upload_size' => '100', //kB 
            ],
            [
                'name' => 'Pro', 
                'max_daily_upload_limit' => '4', 
                'curent_daily_upload_limit' => '4', 
                'max_upload_size' => '500', //kB 
            ],
            [
                'name' => 'Gold', 
                'max_daily_upload_limit' => '10', 
                'curent_daily_upload_limit' => '10', 
                'max_upload_size' => '1000', //kB 
            ]
        ];

        foreach ($packages as $package) {
            Package::create($package);
        }
    }
}
