2<?php

namespace App\Drivers\Markets;

use App\Interfaces\MarketDriverInterface;
use App\Models\Product;

class LendoDriver implements MarketDriverInterface
{
    public function __construct() {
        //Do Login;
        // print "Logging In (Lendo)... \n <br/>";
    }

    public function __destruct() {
        // print "Logging out (Lendo)... \n <br/>";
        // Do Logout;
    }
    public function create(Product $product): bool
    {
        $product->name = $product->name . "In Lendo";
        $product->save();
        // print "Creating Product (Lendo) ... \n <br/>";
        // print "Product Created In Lendo Successfully \n <br/>";
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
