<?php

declare(strict_types=1);

namespace App\Repositories\Categories;

use App\Models\Category;
use Illuminate\Support\Collection;

interface CategoryRepositoryInterface
{
    /**
     * @return Collection<Category>
     */
    public function findAdultCategories(): Collection;
}
