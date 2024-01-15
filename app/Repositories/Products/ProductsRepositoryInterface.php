<?php

declare(strict_types=1);

namespace App\Repositories\Products;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;

interface ProductsRepositoryInterface
{
    /**
     * @return EloquentCollection<Product>
     */
    public function findAll(): EloquentCollection;

    public function find(int $id): Product;

    /**
     * @param array<string, int> $categoriesIds
     * @return Collection<Product>
     */
    public function getProductForNotAdultUsers(array $categoriesIds): Collection;
}
