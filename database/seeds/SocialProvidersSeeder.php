<?php

use Illuminate\Database\Seeder;
use App\SocialProvider;

class SocialProvidersSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $socialProviders = [
      'Local login',
      'Github',
      'Google'
    ];

    foreach ($socialProviders as $socialProvider) {
      SocialProvider::create([
        'name' => $socialProvider
      ]);
    }
  }
}
