<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        view::composer(['client.post._side_block', 'layouts.client'], 'App\Http\ViewComposers\CategoryViewComposer');

        view::composer(['client.post._side_block', 'layouts.client'], 'App\Http\ViewComposers\LatestPostsViewComposer');

        view::composer(['client.post._side_block', 'layouts.client'], 'App\Http\ViewComposers\TagViewComposer');

    }
}
