<?php

return [
    'singletons' => [
        \app\Infrastructure\Contract\IngredientRepositoryInterface::class => [
            ['class' => \app\Infrastructure\Repositories\IngredientRepository::class],
            []
        ],
        \app\Share\Contracts\ConstructDishesInterface::class => [
            ['class' => \app\Share\Handlers\ConstructDishesHandler::class],
            []
        ],
        \app\Share\Builders\DishesBuilder::class => [
            ['class' => \app\Share\Builders\DishesBuilder::class],
            []
        ],
    ]
];
