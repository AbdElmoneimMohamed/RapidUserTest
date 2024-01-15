<?php

declare(strict_types=1);

namespace Tests\Feature\Products;

use App\Models\User;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function testProductsPageIsDisplayed(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/products');

        $response->assertOk();
    }
}
