<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder; 
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Builder::macro('search', function ($field, $string)
        {
            // return $string ? $this->where('body', 'LIKE', "%{$string}%")
            // ->orWhere('keyword', 'LIKE', "%{$string}%") 
            // ->orWhere('category', 'LIKE', "%{$field}%") 
            // ->orWhere('filename', 'LIKE', "%{$field}%") : $this;
        }
    );
    Paginator::useBootstrap();
    }

    
}
