<?php

namespace App\Providers;

use App\Models\Languages;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $languages = Languages::IsActive()->get();
        \Illuminate\Support\Facades\View::share([
            'languages' => $languages
        ]);
    }
}
