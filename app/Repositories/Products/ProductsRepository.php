<?php

declare(strict_types=1);

namespace App\Repositories\Products;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;

class ProductsRepository implements ProductsRepositoryInterface
{
    /**
     * @return EloquentCollection<Product>
     */
    public function findAll(): EloquentCollection
    {
        return Product::all();
    }

    public function find(int $id): Product
    {
        return Product::query()->findOrFail($id);
    }

    /**
     * @return Collection<Product>
     */
    public function getProductForNotAdultUsers(array $categoriesIds): Collection
    {
        return Product::query()->whereNotIn('category_id', $categoriesIds)->get();
    }
}
