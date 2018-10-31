<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\BrandRequest;
use Modules\Admin\Models\User;
use Modules\Admin\Models\Brand;
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
use Illuminate\Support\Facades\DB;

/**
 * Class AdminController
 */
class BrandController extends Controller {
    /**
     * @var  Repository
     */

    /**
     * Displays all admin.
     *
     * @return \Illuminate\View\View
     */
    public function __construct() {
        error_reporting(0);
        ini_set('display_errors', 0);
        $this->middleware('admin');
        View::share('viewPage', 'brand');
        View::share('helper',new Helper);
        $this->record_per_page = Config::get('app.record_per_page');
    }

    protected $categories;

    /*
     * Dashboard
     * */

    public function index(Brand $brand, Request $request) 
    { 
       $page_title = 'Brands';
        $page_action = 'View Brands'; 
        if ($request->ajax()) {
            $id = $request->get('id'); 
            $category = Brand::find($id); 
            $category->status = $s;
            $category->save();
            echo $s;
            exit();
        }
         
        $vendor_id = $request->session()->get('current_vendor_id');
        
        if($request->session()->get('current_vendor_type') != 1){
            $brands = $brand->where('user_id',$vendor_id)->orderBy('id','desc')->Paginate($this->record_per_page);
        }else{
            $brands = $brand->orderBy('id','desc')->Paginate($this->record_per_page);
        }
        
        //echo "<pre>"; print_r($brands); die;

        return view('packages::brand.index', compact('brands', 'page_title', 'page_action','helper'));
   
    }

    /*
     * create  method
     * */

    public function create(Brand $brand, Request $request) 
    {        
        $page_title = 'Brand';
        $page_action = 'Create Brand';
         
        return view('packages::brand.create', compact('categories','cat','category','brand','sub_category_name', 'page_title', 'page_action'));
     }

    /*
     * Save Group method
     * */


   

    public function store(BrandRequest $request, Brand $brand) 
    {                       
        $vendor_id = $request->session()->get('current_vendor_id');
        //echo "<pre>"; print_r($brand); die;
         
            DB::table('brands')->insert(
                ['title' => $request->get('title'),                 
                 'status' => 1,
                 ]
            );
            //$brand->save(); 

         
       
        return Redirect::to(route('brand'))
                            ->with('flash_alert_notice', 'New Brand was successfully created !');
    }
    /*
     * Edit Group method
     * @param 
     * object : $category
     * */

    public function edit(Brand $brand) {

        $page_title = 'Brand';
        $page_action = 'Show Brand';                         

        return view('packages::brand.edit', compact( 'brand', 'page_title', 'page_action'));
    }

    public function update(BrandRequest $request, Brand $brand) 
    {                                            
            
            DB::table('brands')
                    ->where('id', $brand->id)
                    ->update(['title' => $request->get('title'),
                            ]);
            //$brand->save(); 
        
        return Redirect::to(route('brand'))
                        ->with('flash_alert_notice', 'Brand was  successfully updated !');
    }
    /*
     *Delete User
     * @param ID
     * 
     */
    public function destroy(Brand $brand) {
        
        Brand::where('id',$brand->id)->delete();

        return Redirect::to(route('brand'))
                        ->with('flash_alert_notice', 'Brand was successfully deleted!');
    }

    public function show(Brand $brand) {
        
    }

}
