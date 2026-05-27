<?php

use Illuminate\Support\Facades\Route;

Route::get('/{guest?}', function ($guest = null) {
    return view('welcome', compact('guest'));
});