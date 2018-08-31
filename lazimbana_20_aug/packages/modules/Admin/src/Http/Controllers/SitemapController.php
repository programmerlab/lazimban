<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\ProductRequest;
use Modules\Admin\Models\User;
use Modules\Admin\Models\Vendor;
use Modules\Admin\Models\Category;
use Modules\Admin\Models\Product;
use Input;
use Validator;
use Auth;
use Paginate;
use Grids;
use HTML;
use Form;
use Hash;
use View;
use URL;
use Lang;
use Session;
use Route;
use Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Dispatcher; 
use Modules\Admin\Helpers\Helper as Helper;
use Response;

/**
 * Class AdminController
 */
class SitemapController extends Controller {
    /**
     * @var  Repository
     */

    /**
     * Displays all admin.
     *
     * @return \Illuminate\View\View
     */
    public function __construct() {
        $this->middleware('admin');
        View::share('viewPage', 'product');
        View::share('helper',new Helper);
        $this->record_per_page = Config::get('app.record_per_page');
    }

    protected $categories;

    /*
     * Dashboard
     * */

    public function index(Product $product, Request $request) 
    { 
       
        $products = $product->with('category')->select('products.*', 'admin.company_name')->join('admin','products.created_by','=','admin.id')->orderBy('products.id','desc')->Paginate($this->record_per_page);
        
        $categories = Category::with('subcategory')->orderBy('order_id','asc')->get();
        

        // Category sub category list-----
        $html = "";
        $categories2 = Category::with('children')->where('parent_id',0)->orderBy('order_id','asc')->get();
        $cname = [];
        $level = 1; 
        //echo "<pre>"; print_r($categories2); die;
        foreach ($categories2 as $key => $value) {
             
            $cname[$value->name][] = ['id'=>$value->id, 'cname'=>$value->name,'level'=>$value->level];

            $arr[] = ['id'=>$value->id, 'slug'=>$value->slug, 'created_at'=>$value->created_at, 'parent_id'=>$value->parent_id, 'cname'=>$value->name,'level'=>$value->level,'order_id'=>$value->order_id];            

            $cat = Category::where('parent_id',$value->id)->orderBy('order_id','asc')->get();
 

            foreach ($cat as $key => $result) {
                $parent_id = $result->id; 

                $cname[$value->name][$result->id][] = ['id'=>$result->id, 'parent_id'=>$result->parent_id,'cname'=>$result->name,'level'=>$result->level,'order_id'=>$result->order_id];
                
                $arr[] = ['id'=>$result->id, 'slug'=>$result->slug, 'created_at'=>$result->created_at, 'parent_id'=>$result->parent_id, 'cname'=>$result->name,'level'=>$result->level,'order_id'=>$result->order_id];

                while (1) {

                    $data = Category::where('parent_id',$parent_id)->orderBy('order_id','asc')->get();
                    
                    if(count($data)>1){

                        foreach ($data  as $key => $data) {
                             if($data)
                            {
                                $level++;
                                $parent_id = $data->id;

                                $cname[$value->name][$result->id][$parent_id][] = ['id'=>$data->id,'parent_id'=>$data->parent_id,'cname'=>$data->name,'level'=>$data->level,'order_id'=>$data->order_id];
                                
                                 $arr[]  = ['id'=>$data->id, 'slug'=>$data->slug, 'created_at'=>$data->created_at, 'parent_id'=>$data->parent_id,'cname'=>$data->name,'level'=>$data->level,'order_id'=>$data->order_id];
                            }else{
                                break;
                        }
                        }

                    }else{
                        $data = Category::where('parent_id',$parent_id)->first(); 

                    if($data)
                    {
                        
                        $level++;
                        $parent_id = $data->id;

                        $cname[$value->name][$result->id][$parent_id][] = ['id'=>$data->id,'parent_id'=>$data->parent_id,'cname'=>$data->name,'level'=>$data->level,'order_id'=>$data->order_id];
                         
                         $arr[]  = ['id'=>$data->id, 'slug'=>$data->slug, 'created_at'=>$data->created_at, 'parent_id'=>$data->parent_id,'cname'=>$data->name,'level'=>$data->level,'order_id'=>$data->order_id];
                    }else{
                        break;
                    }
                    }
                } 
            }
            $result_set[$value->id]  = $arr; 
            $arr    = []; 
        }

        return response()->view('packages::sitemap.index', [
                                'products' => $products,'categories' => $result_set, 'sitename' => 'https://www.lazimbana.com/'
                            ])->header('Content-Type', 'text/xml');
   
    }

    /*
     * create  method
     * */

    public function categories()
        {
      
          

        
        $categories = Category::with('subcategory')->orderBy('order_id','asc')->get();
        

        // Category sub category list-----
        $html = "";
        $categories2 = Category::with('children')->where('parent_id',0)->orderBy('order_id','asc')->get();
        $cname = [];
        $level = 1; 
        //echo "<pre>"; print_r($categories2); die;
        foreach ($categories2 as $key => $value) {
             
            $cname[$value->name][] = ['id'=>$value->id, 'cname'=>$value->name,'level'=>$value->level];

            $arr[] = ['id'=>$value->id, 'slug'=>$value->slug, 'created_at'=>$value->created_at, 'parent_id'=>$value->parent_id, 'cname'=>$value->name,'level'=>$value->level,'order_id'=>$value->order_id];            

            $cat = Category::where('parent_id',$value->id)->orderBy('order_id','asc')->get();
 

            foreach ($cat as $key => $result) {
                $parent_id = $result->id; 

                $cname[$value->name][$result->id][] = ['id'=>$result->id, 'parent_id'=>$result->parent_id,'cname'=>$result->name,'level'=>$result->level,'order_id'=>$result->order_id];
                
                $arr[] = ['id'=>$result->id, 'slug'=>$result->slug, 'created_at'=>$result->created_at, 'parent_id'=>$result->parent_id, 'cname'=>$result->name,'level'=>$result->level,'order_id'=>$result->order_id];

                while (1) {

                    $data = Category::where('parent_id',$parent_id)->orderBy('order_id','asc')->get();
                    
                    if(count($data)>1){

                        foreach ($data  as $key => $data) {
                             if($data)
                            {
                                $level++;
                                $parent_id = $data->id;

                                $cname[$value->name][$result->id][$parent_id][] = ['id'=>$data->id,'parent_id'=>$data->parent_id,'cname'=>$data->name,'level'=>$data->level,'order_id'=>$data->order_id];
                                
                                 $arr[]  = ['id'=>$data->id, 'slug'=>$data->slug, 'created_at'=>$data->created_at, 'parent_id'=>$data->parent_id,'cname'=>$data->name,'level'=>$data->level,'order_id'=>$data->order_id];
                            }else{
                                break;
                        }
                        }

                    }else{
                        $data = Category::where('parent_id',$parent_id)->first(); 

                    if($data)
                    {
                        
                        $level++;
                        $parent_id = $data->id;

                        $cname[$value->name][$result->id][$parent_id][] = ['id'=>$data->id,'parent_id'=>$data->parent_id,'cname'=>$data->name,'level'=>$data->level,'order_id'=>$data->order_id];
                         
                         $arr[]  = ['id'=>$data->id, 'slug'=>$data->slug, 'created_at'=>$data->created_at, 'parent_id'=>$data->parent_id,'cname'=>$data->name,'level'=>$data->level,'order_id'=>$data->order_id];
                    }else{
                        break;
                    }
                    }
                } 
            }
            $result_set[$value->id]  = $arr; 
            $arr    = []; 
        }   
       // category/106/edit
        
        //echo "<pre>"; print_r($result_set); die;
   
          return response()->view('packages::sitemap.categories', [
              'categories' => $result_set,          
          ])->header('Content-Type', 'text/xml');
        }  

}
