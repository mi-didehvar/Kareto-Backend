<?php

namespace App\Drivers\Markets;

use App\Interfaces\MarketDriverInterface;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Log;

class BasalamDriver implements MarketDriverInterface
{
    public function __construct()
    {
        //Do Login;
        // print "Logging In (Basalam)... \n <br/>";
    }

    public function __destruct()
    {
        // print "Logging out (Basalam)... \n <br/>";
        // Do Logout;
    }
    public function create(Product $product): bool
    {
        try {
            $product->name = $product->name . " In Basalam testing";
            $product->save();
        } catch (Exception $e) {
            throw $e;
        }
        // print "Creating Product (Basalam) ... \n <br/>";
        // print "Product Created In Basalam Successfully \n <br/>";
        return true;
    }
    public function update(Product $product): bool
    {
        return false;
    }

    public function delete(Product $product): bool
    {
        return false;
    }

    public function get(string $id): ?Product
    {
        return null;
    }
}
