<?php

namespace app\Infrastructure\Contract;

use app\Share\Entities\AllProductCollection;

interface IngredientRepositoryInterface
{
    /**
     * @param string[] $ingredientTypes
     */
    public function getByIngredientCodes(array $ingredientTypes): AllProductCollection;
}