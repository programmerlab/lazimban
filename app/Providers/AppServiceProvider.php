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
        


        $cat = $categories = \App\Category::nested()->get(); 
        $mega_menu = [];
        foreach ($cat as $key => $result) {
            $category = $result['name'];
            $id = $result['id'];
            while (1) {  
                $rs = $this->recursive($result);
                //echo "<pre>"; print_r($rs); 
                if($rs['name']!=null){
                    $mega_menu[$id][] = [$rs['slug']=>$rs['name']]; 
                }
                
                $result = $rs;
                $c = count($result['child']);  
                if($c==0){
                    break;
                }
            }  
         }
         
        View::share('mega_menu',$mega_menu);  
        View::share('cats',$cat); 

        $category_menu = CategoryDashboard::with('category')->get();
        
        View::share('category_menu',$category_menu);

        $title = last(request()->segments());
        View::share('main_title',$title);
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
        //echo "<pre>"; print_r($result); die;
        foreach ($result['child'] as $key => $value) {
            return $value;
        }
    }
}
