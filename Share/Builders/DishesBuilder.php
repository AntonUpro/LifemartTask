<?php

namespace app\Share\Builders;

use app\Share\Entities\Dish;
use app\Share\Entities\DishCollection;
use app\Share\Entities\AllProductCollection;
use app\Share\Entities\ProductsCollection;

class DishesBuilder
{
    /**
     * @param string[] $ingredients
     */
    public function build(array $ingredients, AllProductCollection $allProductCollection): DishCollection
    {
        $productsById = [];
        foreach ($ingredients as $key => $code) {
            $productsById = $this->buildById(
                $productsById,
                $allProductCollection->getByCode($code),
                $key + 1,
            );
        }

        $dishCollection = new DishCollection();
        foreach ($productsById as $productsIds) {
            $price = 0;
            $productCollection = new ProductsCollection();
            foreach ($productsIds as $productId) {
                $product = $allProductCollection->getById($productId);
                $price += $product->getPrice();
                $productCollection->add($product);
            }

            $dishCollection->add(
                new Dish(
                    $productCollection,
                    $price,
                ),
            );
        }

        return $dishCollection;
    }

    /**
     * @param array<array<int>> $existArray
     * @param int[] $newProducts
     * @return array<array<int>>
     */
    private function buildById(array $existArray, array $newProducts, int $count): array
    {
        $response = [];
        if (!$existArray) {
            foreach ($newProducts as $product) {
                $response[][] = $product;
            }

            return $response;
        }

        $response = [];
        foreach ($newProducts as $newProduct) {
            foreach ($existArray as $value) {
                if (in_array($newProduct, $value) || count($value) >= $count) {
                    continue;
                }
                $value[] = $newProduct;
                sort($value);
                $response[] = $value;
            }
        }

        return array_unique($response, SORT_REGULAR);
    }
}