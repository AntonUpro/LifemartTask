<?php


namespace app\Infrastructure\Repositories;

use app\Infrastructure\Contract\IngredientRepositoryInterface;
use app\Share\Entities\DishCollection;

class IngredientRepository implements IngredientRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function getByIngredientTypes(array $ingredientTypes): DishCollection
    {
        // TODO: Implement getByIngredientTypes() method.
    }
}