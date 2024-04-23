<?php

namespace app\Share\Contracts;

use app\Share\Entities\DishCollection;

interface ConstructDishesInterface
{
    /**
     * @param string[] $codeIngredients
     */
    public function constructProducts(array $codeIngredients): DishCollection;
}