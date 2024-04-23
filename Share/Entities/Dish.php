<?php

namespace app\Share\Entities;

class Dish
{
    private ProductsCollection $productCollection;
    private float $totalPrice;

    public function __construct(
        ProductsCollection $productCollection,
        float $totalPrice
    ) {
        $this->productCollection = $productCollection;
        $this->totalPrice = $totalPrice;
    }

    public function getProductCollection(): ProductsCollection
    {
        return $this->productCollection;
    }

    public function getTotalPrice(): float
    {
        return $this->totalPrice;
    }
}