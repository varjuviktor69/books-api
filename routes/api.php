<?php

declare(strict_types = 1);

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::prefix('books/')->group(function(): void {
    Route::get('', [BookController::class, 'getAll']);
    Route::get('{id}', [BookController::class, 'getById']);
    Route::post('', [BookController::class, 'store']);
    Route::put('{id}', [BookController::class, 'update']);
    Route::delete('{id}', [BookController::class, 'destroy']);
});