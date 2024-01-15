<?php

declare(strict_types=1);

namespace App\Repositories\Categories;

use App\Models\Category;
use Illuminate\Support\Collection;

class CategoriesRepository implements CategoryRepositoryInterface
{
    /**
     * @return Collection<Category>
     */
    public function findAdultCategories(): Collection
    {
        return Category::query()->where('for_adult', '=', 1)->pluck('id');
    }
}
