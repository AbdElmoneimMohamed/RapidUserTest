<?php

declare(strict_types=1);

namespace App\Shared;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserConfiguration
{
    private const MIN_ADULT_AGE = 18;

    private const MAX_ADULT_AGE = 30;

    public function isAdultUser(): bool
    {
        /** @var User $user */
        $user = Auth::user();

        if ($user->getAttribute('age') > self::MIN_ADULT_AGE && $user->getAttribute('age') < self::MAX_ADULT_AGE) {
            return true;
        }

        return false;
    }
}
