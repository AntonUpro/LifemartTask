<?php

namespace app\Share\Views;

use app\Share\Entities\DishCollection;
use app\Share\Entities\ProductsCollection;

class DishesView
{
    private const FIELD_PRICE = 'price';
    private const FIELD_PRODUCTS = 'products';
    private const FIELD_TYPE = 'type';
    private const FIELD_VALUE = 'value';

    /**
     * @return array{'price': float, 'products': array}
     */
    public function toArray(DishCollection $dishCollection): array
    {
        $response = [];
        foreach ($dishCollection->getAll() as $dish) {
            $dishArray = [];
            $dishArray[self::FIELD_PRICE] = $dish->getTotalPrice();
            $dishArray[self::FIELD_PRODUCTS] = $this->buildProducts($dish->getProductCollection());
            $response[] = $dishArray;
        }

        return $response;
    }

    /**
     * @return array{'type': string, 'value': string}
     */
    private function buildProducts(ProductsCollection $productsCollection): array
    {
        $productsArray = [];
        foreach ($productsCollection->getAll() as $product) {
            $productsArray[] = [
                self::FIELD_TYPE => $product->getIngredientTypeTitle(),
                self::FIELD_VALUE => $product->getIngredientTitle(),
            ];
        }

        return $productsArray;
    }
}