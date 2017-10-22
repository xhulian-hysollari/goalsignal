<?php

namespace App\Providers;

use App\Models\Categories;
use App\Models\Feeds;
use App\Models\Pages;
use Illuminate\Support\ServiceProvider;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ViewComposerProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('partials.navbar', function ($view) {
            $locale = LaravelLocalization::getCurrentLocaleName();

            $view->with('resulted', Categories::where('locale', $locale)->where('on_header', 1)->latest('updated_at')->take(3)->get());
        });

        view()->composer('partials.sideContent', function ($view) {
            $locale = LaravelLocalization::getCurrentLocaleName();

            $view->with('sideRes', Feeds::where('locale', $locale)->latest()->take(3)->get());
        });

        view()->composer('partials.sideContent', function ($view) {
            $locale = LaravelLocalization::getCurrentLocaleName();

            $view->with('mostViewed', Feeds::where('locale', $locale)->latest('view_count')->take(7)->get());
        });


        view()->composer('partials.sideContent', function ($view) {
            $locale = LaravelLocalization::getCurrentLocaleName();

            $view->with('featured', Feeds::where('locale', $locale)->where('is_featured', 1)->latest()->take(7)->get());
        });


        view()->composer('partials.footer', function($view) {
            $locale = LaravelLocalization::getCurrentLocaleName();

            $view->with('categories', Categories::where('locale', $locale)->get());
        });


        view()->composer('partials.sideContent', function($view) {
            $locale = LaravelLocalization::getCurrentLocaleName();

            $view->with('categories', Categories::where('locale', $locale)->get());
        });


        view()->composer('partials.footer', function($view) {
            $locale = LaravelLocalization::getCurrentLocaleName();

            $view->with('pages', Pages::where('locale', $locale)->where('on_footer',1)->get());
        });

        view()->composer('partials.navbar', function($view) {
            $locale = LaravelLocalization::getCurrentLocaleName();

            $view->with('pages',  Pages::where('locale', $locale)->get());
        });

    }


    public function register()
    {
        //
    }
}
