<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Bid;
use App\Mail\BidInformationEmail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use DB;

class SendBidInformation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:information';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email with bid information';

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
        $data = [
            'total_bids' => Bid::count(),
            'total_active_bids' => Bid::where('bid_status_id', 1)->count(),
            'total_terminated_bids' => Bid::where('bid_status_id', 2)->count(),
            'total_won_bids' => Bid::where('bid_status_id', 3)->count(),
            'total_amount' => Bid::sum('total'),
            'total_number_of_tickets' => Bid::select(DB::raw("SUM(adult_count) + SUM(children_count) + SUM(infant_count)")),
            'total_number_of_tickets' => DB::table('bids')
                                           ->sum(DB::raw('adult_count + children_count + infant_count')),
            'total_amount_active' => Bid::where('bid_status_id', 1)->sum('total'),
            'total_number_of_active_tickets' => DB::table('bids')
                                                  ->where('bid_status_id', 1)
                                                  ->sum(DB::raw('adult_count + children_count + infant_count'))
        ];

        $emails = [
            'md@ata.one',
            'sandra.mikulic@hr.ibm.com',
            'lina@ata.one',
            'srdan@ata.one',
            'dom@ata.one',
            'i.janovic@gmail.com',
            'sasa.pavlovich@gmail.com',
            'andresarinic@gmail.com',
            'jirka@hvezdicka.cz',
            'carito.silveira@gmail.com',
            'giulia.varsano@gmail.com',
            'aleondidis@gmail.com',
            'michaelamou@gmail.com',
            'mark.mclaren65@gmail.com',
            'monalisaw@gmail.com',
            'beno@e-mojster.com',
            'abdallah.dandachi@gmail.com',
            'georg.oehme@gmail.com',
            'zulu@ata.one'
        ];

        Mail::to($emails)->send(new BidInformationEmail($data));
    }
}
