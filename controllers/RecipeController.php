<?php

namespace app\controllers;

use app\Infrastructure\Repositories\IngredientRepository;
use app\Share\Builders\DishesBuilder;
use app\Share\Contracts\ConstructDishesInterface;
use app\Share\Handlers\ConstructDishesHandler;
use app\Share\Views\DishesView;

class RecipeController extends AbstractApiController
{
    private ConstructDishesInterface $constructDishesHandler;
    private DishesView $dishesView;

    public function __construct(
        $id,
        $module,
        $config = []
    ) {
        parent::__construct($id, $module, $config);
        $this->constructDishesHandler = new ConstructDishesHandler(
            new IngredientRepository(),
            new DishesBuilder(),
        );
        $this->dishesView = new DishesView();
    }

    public function actionGet(
        string $code
    ): array {
        try {
            $resp = $this->constructDishesHandler->constructProducts(str_split($code));
        } catch (\Exception $exception) {
            return $this->sendErrorResponse($exception->getMessage());
        }

        return $this->sendSuccessResponse(
            $this->dishesView->toArray($resp)
        );
    }
}
