<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// require __DIR__.'/../app/Concerns/Demonstration/routes/web.php';
