<?php

namespace app\Share\Entities;

class ProductsCollection
{
    /**
     * @var Product[]
     */
    private array $products;

    public function add(Product $product): void
    {
        $this->products[] = $product;
    }

    /**
     * @return Product[]
     */
    public function getAll(): array
    {
        return $this->products;
    }
}