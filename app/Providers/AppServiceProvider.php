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
        $system_languages = Languages::IsActive()->get();
        \Illuminate\Support\Facades\View::share([
            'system_languages' => $system_languages
        ]);
    }
}
