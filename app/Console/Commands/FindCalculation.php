<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Calculation;
use Carbon\Carbon;
use App\Jobs\CalculateBids;
use Illuminate\Support\Facades\Log;
class FindCalculation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calculation:find';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Find 24 or 48 hours calculation';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $firstCalcHours = 24;
        $firstCalcStatusStart = 2; // 24h in process
        $firstCalcStatusFinish = 3; // 24h in process finish
        $firstCalculations = Calculation::whereRaw('YEAR(calculation_date) = '. Carbon::now()->addHours($firstCalcHours)->year)
                                    ->whereRaw('MONTH(calculation_date) = '. Carbon::now()->addHours($firstCalcHours)->month)
                                    ->whereRaw('DAY(calculation_date) = '. Carbon::now()->addHours($firstCalcHours)->day)
                                    ->whereRaw('HOUR(calculation_date) = '. Carbon::now()->addHours($firstCalcHours)->hour)
                                    ->whereRaw('MINUTE(calculation_date) = '. Carbon::now()->addHours($firstCalcHours)->minute)
                                    ->get();

        $secundCalcHours = 48;
        $secundCalcStatusStart = 4; // 48h in process
        $secundCalcStatusFinish = 5; // 48h in process finish
        $secundCalculations = Calculation::whereRaw('YEAR(calculation_date) = '. Carbon::now()->addHours($secundCalcHours)->year)
                                    ->whereRaw('MONTH(calculation_date) = '. Carbon::now()->addHours($secundCalcHours)->month)
                                    ->whereRaw('DAY(calculation_date) = '. Carbon::now()->addHours($secundCalcHours)->day)
                                    ->whereRaw('HOUR(calculation_date) = '. Carbon::now()->addHours($secundCalcHours)->hour)
                                    ->whereRaw('MINUTE(calculation_date) = '. Carbon::now()->addHours($secundCalcHours)->minute)
                                    ->get();

        
        if(isset($firstCalculations) && !empty($firstCalculations)) {
            foreach($firstCalculations as $fc) {
                CalculateBids::dispatch($fc->id, $fc->itinerary_id, $firstCalcStatusStart, $firstCalcStatusFinish, $firstCalcHours)->onQueue('calcBids');
            }
        }

        if(isset($secundCalculations) && !empty($secundCalculations)) {
            foreach($secundCalculations as $sc) {
                CalculateBids::dispatch($sc->id, $sc->itinerary_id , $secundCalcStatusStart, $secundCalcStatusFinish, $secundCalcHours)->onQueue('calcBids');
            }
        }

        $this->info(json_encode(['start' => Carbon::now(), '24h' => count($firstCalculations), '48h' => count($secundCalculations)]));
    }
}
