<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class Broadcast extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'broadcast:listen';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        while (true) {
            try {
                Redis::psubscribe(['*'], function ($message, $channel) {
                    echo $message . PHP_EOL;
                });

            }
            catch (\Exception $e) {
                echo "Resetting Connection";
            }
        }


        return 0;
    }
}
