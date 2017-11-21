<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //View::share('name','Saha');
        View()->composer('frontEnd.layouts.header',function(){
           // $view->share('name','Kakoli');
            $allPublishedCategories = Category::where('publication_status',1)->get();
            View::share('allPublishedCategories',$allPublishedCategories);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
