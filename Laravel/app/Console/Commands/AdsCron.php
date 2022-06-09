<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Carbon\Carbon;
use Mail;

class AdsCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ads:cron';

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
        // $products = 
        $products = Product::where('expire','==', Carbon::today())->with('seller')->get();
        foreach($products as $product)
        {
            \Mail::to($product->seller->email)->send(new \App\Mail\AdsMail());
            
            // $created_at = explode(' ',$product->created_at);
            // $created_at = $created_at[0];
            // if($date_now > $created_at)
            // {
            //     $product->expire = '1';
            //     $product->save();
            // }
        }
    }
}
