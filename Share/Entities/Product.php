<?php

namespace app\Share\Entities;

class Product
{
    private int $id;
    private string $ingredientTitle;
    private string $ingredientTypeTitle;
    private float $price;
    private string $code;

    public function __construct(
        int $id,
        string $ingredientTitle,
        string $ingredientTypeTitle,
        float $price,
        string $code
    ) {
        $this->id = $id;
        $this->ingredientTitle = $ingredientTitle;
        $this->ingredientTypeTitle = $ingredientTypeTitle;
        $this->price = $price;
        $this->code = $code;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getIngredientTitle(): string
    {
        return $this->ingredientTitle;
    }

    public function getIngredientTypeTitle(): string
    {
        return $this->ingredientTypeTitle;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getCode(): string
    {
        return $this->code;
    }
}