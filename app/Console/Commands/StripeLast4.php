<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Stripe\Customer;

class StripeLast4 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stripe:last4';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set to all users last4 card';

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
        $users = User::all();

        foreach ($users as $user) {
            if(!is_null($user->card_id)) {
                try 
                {
                  $customer = Customer::retrieve($user->card_id);    
                } catch (Exception $e) {
                    $this->info($e->getMessage());
                    break;
                }
               
               if(isset($customer->sources) && isset($customer->sources->data[0])) {
                $user->credit_card_last_four = $customer->sources->data[0]->last4;
                $user->save();
               }
            }
        }
        $this->info('All users card last 4 was setted');
    }
}
