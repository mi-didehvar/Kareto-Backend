<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProductOperator implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $driver = null;
    public function __construct($driver)
    {
        $this->driver = new (config("driver.$driver.driver"));
    }

    /**
     * Execute the job.
     */
    public function handle(Request $request): void
    {
        try{
        $product = new Product();
        $product->name = "Test";
        $product->slug = "test";
        $product->price = 1000;
        $product->image = "test.png";
        $this->driver->create( $product );
        }
        catch( \Exception $e ){
            echo $e->getMessage();
            Log::error("Test: ". $e->getMessage() );
        }
    }
}
