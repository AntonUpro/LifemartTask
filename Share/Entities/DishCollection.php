<?php

namespace app\Share\Entities;

class DishCollection
{
    /**
     * @var Dish[]
     */
    private array $dishes = [];

    public function add(Dish $dish): void
    {
        $this->dishes[] = $dish;
    }

    /**
     * @return Dish[]
     */
    public function getAll(): array
    {
        return $this->dishes;
    }
}