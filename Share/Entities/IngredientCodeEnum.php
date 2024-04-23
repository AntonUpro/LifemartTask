<?php

namespace app\Share\Entities;

class IngredientCodeEnum
{
    public const INGREDIENT_CODE_D = 'd';
    public const INGREDIENT_CODE_C = 'c';
    public const INGREDIENT_CODE_I = 'i';

    public const ALL_INGREDIENT_CODES = [
        self::INGREDIENT_CODE_D,
        self::INGREDIENT_CODE_C,
        self::INGREDIENT_CODE_I,
    ];
}