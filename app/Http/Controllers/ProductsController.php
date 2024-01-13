<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Webmozart\Assert\Assert;

class ProductsController extends Controller
{
    private const MIN_ADULT_AGE = 18;
    private const MAX_ADULT_AGE = 30;

    public function list(): view
    {
        $categoriesForAdult = Category::where('for_adult', '=', 1)->pluck('id')->toArray();

        $user = Auth::getUser();

        if ($user->age < self::MIN_ADULT_AGE || $user->age > self::MAX_ADULT_AGE) {
            $products = Product::whereNotIn('category_id', $categoriesForAdult)->get();
        } else {
            $products = Product::all();
        }

        return view('products.list', compact('products'));
    }

    public function details($id): view
    {
        $product = Product::find($id);

        return view('products.show', compact('product'));
    }
}
