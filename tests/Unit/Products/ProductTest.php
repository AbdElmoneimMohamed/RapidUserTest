<?php

declare(strict_types=1);

namespace Tests\Unit\Products;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function testAdultUserCanAccessAdultCategoryProducts(): void
    {
        $adultCategory = Category::factory()->create(
            [
                'for_adult' => 1,
            ]
        );

        $product = Product::factory()->create(
            [
                'category_id' => $adultCategory->id,
            ]
        );

        $adultUser = User::factory()->create(
            [
                'age' => 25,
            ]
        );

        $response = $this
            ->actingAs($adultUser)
            ->get('/products/' . $product->id);

        $response->assertOk();
    }

    public function testNotAdultUserCanNotAccessAdultCategoryProducts(): void
    {
        $adultCategory = Category::factory()->create(
            [
                'for_adult' => 1,
            ]
        );

        $product = Product::factory()->create(
            [
                'category_id' => $adultCategory->id,
            ]
        );

        $adultUser = User::factory()->create(
            [
                'age' => 17,
            ]
        );

        $response = $this
            ->actingAs($adultUser)
            ->get('/products/' . $product->id);

        $response->assertUnauthorized();
    }

    public function testNotAdultUserCanAccessNotAdultCategoryProducts(): void
    {
        $adultCategory = Category::factory()->create(
            [
                'for_adult' => 0,
            ]
        );

        $product = Product::factory()->create(
            [
                'category_id' => $adultCategory->id,
            ]
        );

        $adultUser = User::factory()->create(
            [
                'age' => 17,
            ]
        );

        $response = $this
            ->actingAs($adultUser)
            ->get('/products/' . $product->id);

        $response->assertOk();
    }

    public function testAdultUserCanAccessNotAdultCategoryProducts(): void
    {
        $adultCategory = Category::factory()->create(
            [
                'for_adult' => 0,
            ]
        );

        $product = Product::factory()->create(
            [
                'category_id' => $adultCategory->id,
            ]
        );

        $adultUser = User::factory()->create(
            [
                'age' => 25,
            ]
        );

        $response = $this
            ->actingAs($adultUser)
            ->get('/products/' . $product->id);

        $response->assertOk();
    }
}
