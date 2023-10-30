<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\center;

class expiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'center:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'exoire center every 1 day automatically';

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
     * @return int
     */
    public function handle()
    {
       $centers= center::where('status','=',0)->get();
       foreach($centers as $cen)
       {
            if($cen->edate < date('Y-m-d'))
            {
                $cen->update([
                    'status'=> 1,
                ]);
            }
       }
    }
}
