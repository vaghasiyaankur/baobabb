<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use App\Models\Product;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function(){
            $products = Product::where('expire','0')->get();
            $date_now = date("Y-m-d",strtotime('-30 days'));
            foreach($products as $product)
            {
                $created_at = explode(' ',$product->created_at);
                $created_at = $created_at[0];
                if($date_now > $created_at)
                {
                    $product->expire = '1';
                    $product->save();
                }
            }
        })->everySecond();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
