<?php

declare(strict_types=1);

namespace App\Http\Requests;

final class ProductRequest
{

    public function __construct(
        private readonly string $name,
        private readonly string $description,
        private readonly int $price,
        private readonly int $stock
    ){}

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getStock()
    {
        return $this->stock;
    }



}