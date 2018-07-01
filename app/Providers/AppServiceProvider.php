<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use Modules\Admin\Models\CategoryDashboard;
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
        $category_list = \App\Category::where('parent_id',0)->get();

        if(isset($category_list)){
            View::share('category_list',$category_list);    
        }else{
           View::share('category_list',[]);  
        }
        View::share('category_list',$category_list);  
 

        $category_menu = CategoryDashboard::with('category')->get();
        if(isset($category_menu)){
            foreach ($category_list as $key => $value) {   
                if(isset($mega_menu[$value->id])){
                    foreach ($mega_menu[$value->id] as $key => $result) {  
                         foreach ($result as $url => $menu) {
                             // dd($menu);
                         }
                    }
                 }
            }  
            View::share('category_menu',$category_menu);
        }else{
            View::share('category_menu',[]);
        } 
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

    public function recursive($result){
        
        foreach ($result['child'] as $key => $value) {
            return $value;
        }
    }
}
