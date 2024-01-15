<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Models\Product;
use App\Shared\UserConfiguration;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureTheProductForAdult
{
    public function __construct(
        private readonly UserConfiguration $userConfiguration
    ) {
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $productId = $request->route('id');

        $product = Product::query()->findorfail($productId);

        if ($product->category->for_adult) {
            if (! $this->userConfiguration->isAdultUser()) {
                abort(401);
            }
        }
        return $next($request);
    }
}
