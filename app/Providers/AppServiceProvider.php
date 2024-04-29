<?php

declare(strict_types = 1);

namespace App\Providers;

use App\Interfaces\BookService;
use App\Services\BookServiceImpl;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(BookService::class, BookServiceImpl::class);
        
    }
}
