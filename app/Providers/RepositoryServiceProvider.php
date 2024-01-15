<?php

declare(strict_types=1);

namespace App\Providers;

use App\Repositories\Categories\CategoriesRepository;
use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Repositories\Products\ProductsRepository;
use App\Repositories\Products\ProductsRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            ProductsRepositoryInterface::class,
            ProductsRepository::class
        );

        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoriesRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
