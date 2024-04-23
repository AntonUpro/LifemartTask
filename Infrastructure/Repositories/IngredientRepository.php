<?php

namespace app\Infrastructure\Repositories;

use app\Infrastructure\Contract\IngredientRepositoryInterface;
use app\models\IngredientType;
use app\Share\Entities\AllProductCollection;
use app\Share\Entities\Product;

class IngredientRepository implements IngredientRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function getByIngredientCodes(array $ingredientCodes): AllProductCollection
    {
        $ingredientTypes = IngredientType::find()->andWhere(['in', 'code', $ingredientCodes])->all();

        $dishes = new AllProductCollection();

        foreach ($ingredientTypes as $ingredientType) {
            foreach ($ingredientType->ingredients as $ingredient) {
                $dishes->add(
                    new Product(
                        $ingredient->id,
                        $ingredient->title,
                        $ingredientType->title,
                        $ingredient->price,
                        $ingredientType->code,
                    )
                );
            }
        }

        return $dishes;
    }
}