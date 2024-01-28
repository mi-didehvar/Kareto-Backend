<?php

namespace App\Drivers\Markets;

use App\Interfaces\MarketDriverInterface;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Log;

class SnappDriver implements MarketDriverInterface
{
    public function __construct() {
        //Do Login;
        // print "Logging In (Snapp)... \n <br/>";
    }

    public function __destruct() {
        // print "Logging out (Snapp)... \n <br/>";
        // Do Logout;
    }
    public function create(Product $product): bool
    {
        try {
            $product->name = $product->name . " In Snapp";
            $product->save();
        }
        catch(Exception $e) {
            throw $e;
        }
        // print "Product Created In Snapp Successfully \n <br/>";
        return true;
    }
    public function update(Product $product) : bool
    {
        return false;
    }

    public function delete(Product $product) : bool
    {
        return false;
    }

    public function get(string $id) : ?Product
    {
        return null;
    }
}
