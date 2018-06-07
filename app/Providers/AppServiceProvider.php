<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use Modules\Admin\Models\CategoryDashboard;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $category_list = \App\Category::where('parent_id',0)->get();
        View::share('category_list',$category_list);


        $category_menu = CategoryDashboard::with('category')->get();
        View::share('category_menu',$category_menu);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Way\Generators\GeneratorsServiceProvider::class);
            $this->app->register(\Xethron\MigrationsGenerator\MigrationsGeneratorServiceProvider::class);
        }
    }
}
