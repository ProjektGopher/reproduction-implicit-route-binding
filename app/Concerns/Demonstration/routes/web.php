<?php

declare(strict_types=1);

use App\Concerns\Demonstration\Enums\DemonstrationEnum;
use Illuminate\Support\Facades\Route;

Route::get('/demonstration/{demonstration_enum}', function (DemonstrationEnum $demonstration_enum) {
    return $demonstration_enum->value;
})->name('demonstration');
