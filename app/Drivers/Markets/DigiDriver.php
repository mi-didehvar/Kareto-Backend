<?php

namespace App\Drivers\Markets;

use App\Interfaces\MarketDriverInterface;
use App\Models\Product;
class DigiDriver implements MarketDriverInterface
{
    public function __construct() {
        //Do Login;
        // print "Logging In (Digikala)... \n <br/>";
    }

    public function __destruct() {
        // print "Logging out (Digikala)... \n <br/>";
        // Do Logout;
    }
    public function create(Product $product): bool
    {
        try {
        $product->name = $product->name . "In Digikala";
        $product->save();
        }
        catch (\Exception $e) {
            
        }
        // print "Creating Product ... \n <br/>";
        // print "Product Created In Digikala Successfully \n <br/>";
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
