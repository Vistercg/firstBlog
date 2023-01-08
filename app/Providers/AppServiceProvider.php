<?php

namespace App\Providers;

use App\Category;
use App\Post;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Jenssegers\Date\Date;

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

        Date::setlocale(config('app.locale'));

        view()->composer('layouts.sidebar', function ($view) {
            $view->with('popular_posts', Post::orderBy('views', 'desc')->limit(3)->get());
            $view->with('cats', Category::withCount('posts')->orderBy('posts_count', 'desc')->get());
        });

        view()->composer('posts.show', function ($view) {
            $view->with('popular_posts', Post::orderBy('views', 'desc')->limit(2)->get());
        });

        view()->composer('layouts.navbar', function ($view) {
            $view->with('categories', Category::all());
        });
    }
}
