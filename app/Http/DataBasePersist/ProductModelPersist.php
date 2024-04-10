<?php

declare(strict_types=1);

namespace App\Http\DataBasePersist;

use App\Http\Repository\ProductRepository;
use App\Http\Requests\ProductRequest;
use App\Models\Product;


final class ProductModelPersist implements ProductRepository
{

    public function __construct(private readonly Product $productModel)
    {}

    public function getAll(){
        return $this->productModel->all();
    }

    public function store(ProductRequest $product): void
    {
        $newProduct = $this->productModel->create([
            'name' => $product->getName(),
            'description' => $product->getDescription(),
            'price' => $product->getPrice(),
            'stock' => $product->getStock()
        ]);
    }

    public function update(Product $pr, ProductRequest $product): void
    {
        $pr->update([
            $pr->name = $product->getName(),
            $pr->description = $product->getDescription(),
            $pr->price = $product->getPrice(),
            $pr->stock = $product->getStock()
        ]);
    }

    public function delete(Product $pr): void
    {
        $pr->delete();
    }


}


?>