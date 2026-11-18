<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KatalogController;

Route::get('/', [KatalogController::class, 'index'])->name('katalog.index');
