<?php

namespace App\Http\Repository;

use App\Http\Requests\ProductRequest;
use App\Models\Product;

interface ProductRepository
{
    public function getAll();
    public function store(ProductRequest $product): void;
    public function update(Product $pr, ProductRequest $product): void;
    public function delete(Product $pr): void;
}




?>