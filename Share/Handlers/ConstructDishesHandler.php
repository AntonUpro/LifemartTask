<?php

namespace app\Share\Handlers;

use app\Infrastructure\Repositories\IngredientRepository;
use app\Share\Builders\DishesBuilder;
use app\Share\Contracts\ConstructDishesInterface;
use app\Share\Entities\DishCollection;
use app\Share\Entities\IngredientCodeEnum;

class ConstructDishesHandler implements ConstructDishesInterface
{
    private IngredientRepository $ingredientRepository;
    private DishesBuilder $dishesBuilder;

    public function __construct(
        IngredientRepository $ingredientRepository,
        DishesBuilder $dishesBuilder
    ) {
        $this->ingredientRepository = $ingredientRepository;
        $this->dishesBuilder = $dishesBuilder;
    }

    /**
     * @inheritDoc
     */
    public function constructProducts(array $codeIngredients): DishCollection
    {
        $this->validateTypesIngredients($codeIngredients);

        $allProductCollection = $this->ingredientRepository->getByIngredientCodes(array_unique($codeIngredients));

        $productCollection = $this->dishesBuilder->build($codeIngredients, $allProductCollection);

        return $productCollection;
    }

    private function validateTypesIngredients(array $codeIngredients): void
    {
        // Так как типов не много, делаю валидацию через класс Enum, при большос количестве кодов нужно делать запрос в БД для валидации
        foreach ($codeIngredients as $codeIngredient) {
            if (! in_array($codeIngredient, IngredientCodeEnum::ALL_INGREDIENT_CODES)) {
                throw new \InvalidArgumentException('Не верный код ингридиента - ' . $codeIngredient);
            }
        }
    }
}