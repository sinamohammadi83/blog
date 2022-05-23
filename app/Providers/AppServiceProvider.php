<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
        view()->composer([
            'website.*'
        ],function ($view){
            $view->with([
                'categories' => Category::query()->whereNull('category_id')->get()
            ]);
        });

        view()->composer([
            'client.*'
        ],function ($view){
            $view->with([
                'authUser' => auth()->user(),
                'minipanel' => request()->cookie('mini_menu')=='true'
            ]);
        });

        Paginator::useBootstrap();
    }
}
