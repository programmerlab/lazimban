<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Modules\Admin\Models\CategoryDashboard;
use App\Category;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
 

    public function __construct(){
    	
    	$cat  = Category::nested()->get(); 
        
        if(isset($cat)){
            $mega_menu = [];
            foreach ($cat as $key => $result) {
                $category = $result['name'];
                $id = $result['id'];
                while (1) {  
                    $rs = $this->recursive($result); 
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
        }else{
            View::share('mega_menu',[]);
        }
    }
}
