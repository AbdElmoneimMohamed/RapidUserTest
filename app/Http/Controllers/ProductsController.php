<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Repositories\Products\ProductsRepositoryInterface;
use App\Shared\UserConfiguration;
use Illuminate\Contracts\View\View;

final class ProductsController extends Controller
{
    public function __construct(
        private readonly ProductsRepositoryInterface $productsRepository,
        private readonly CategoryRepositoryInterface $categoryRepository,
        private readonly UserConfiguration $userConfiguration
    ) {
    }

    public function list(): View
    {
        $categoriesForAdult = $this->categoryRepository->findAdultCategories()->toArray();

        if ($this->userConfiguration->isAdultUser()) {
            $products = $this->productsRepository->findAll();
        } else {
            $products = $this->productsRepository->getProductForNotAdultUsers($categoriesForAdult);
        }

        return view('products.list', compact('products'));
    }

    public function details(int $id): View
    {
        $product = $this->productsRepository->find($id);

        return view('products.show', compact('product'));
    }
}
