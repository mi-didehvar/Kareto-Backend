<?php
namespace App\Interfaces;

use App\Models\Product;

interface MarketDriverInterface
{
    public function create (Product $product): bool;
    public function update(Product $product): bool;
    public function delete(Product $product): bool;
    public function get(string $id): ?Product;
}