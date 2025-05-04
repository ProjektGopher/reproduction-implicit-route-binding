<?php

declare(strict_types=1);

namespace App\Concerns\Demonstration;

class DemonstrationServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
    }
}