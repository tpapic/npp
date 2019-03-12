<?php

namespace App\Console;

use App\Jobs\Dispatcher\TaskDispatcher;
use App\TaskType;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use App\Handlers\TaskTypeHandler;
use App\Console\Commands\FindCalculation;
use App\Console\Commands\SendBidInformation;
use App\Console\Commands\StripeLast4;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        FindCalculation::class,
        SendBidInformation::class,
        StripeLast4::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command(FindCalculation::class)->everyMinute();
        $schedule->command(SendBidInformation::class)->dailyAt('04:00');
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
