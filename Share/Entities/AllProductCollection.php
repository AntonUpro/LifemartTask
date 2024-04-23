<?php

namespace app\Share\Entities;

class ProductCollection
{
    /**
     * @var array<int[]>
     */
    private array $groupProductsByCode;

    /**
     * @var Product[]
     */
    private array $productsById;

    public function add(string $code, Product $dish): void
    {
        $this->groupProductsByCode[$code][] = $dish->getId();
        $this->productsById[$dish->getId()] = $dish;

    }

    /**
     * @return array<Product[]>
     */
    public function getAll(): array
    {
        return $this->groupProductsByCode;
    }

    /**
     * @return int[]
     */
    public function getByCode(string $code): array
    {
        if (! isset($this->groupProductsByCode[$code])) {
            throw new \InvalidArgumentException('Не верный код ингридиента - ' . $code);
        }

        return $this->groupProductsByCode[$code];
    }

    public function getById(int $id): Product
    {
        if (! isset($this->productsById[$id])) {
            throw new \InvalidArgumentException('Не верный id ингридиента - ' . $id);
        }

        return $this->productsById[$id];
    }
}