<?php

namespace App\Providers;

use App\Models\Student;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

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
        // Explicit route model binding: {roll} in a URL is resolved by the roll_no column.
        // /roll/11 -> Student whose roll_no is "11"; unknown roll -> 404.
        Route::bind('roll', fn ($value) => Student::where('roll_no', $value)->firstOrFail());
    }
}