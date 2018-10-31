<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\SizeRequest;
use Modules\Admin\Models\User;
use Modules\Admin\Models\Size;
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
class SizeController extends Controller {
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
        View::share('viewPage', 'size');
        View::share('helper',new Helper);
        $this->record_per_page = Config::get('app.record_per_page');
    }

    protected $categories;

    /*
     * Dashboard
     * */

    public function index(Size $size, Request $request) 
    { 
       $page_title = 'Sizes';
        $page_action = 'View Sizes'; 
        if ($request->ajax()) {
            $id = $request->get('id'); 
            $category = Size::find($id); 
            $category->status = $s;
            $category->save();
            echo $s;
            exit();
        }
         
        $vendor_id = $request->session()->get('current_vendor_id');
        
        if($request->session()->get('current_vendor_type') != 1){
            $sizes = $size->where('user_id',$vendor_id)->orderBy('id','desc')->Paginate($this->record_per_page);
        }else{
            $sizes = $size->orderBy('id','desc')->Paginate($this->record_per_page);
        }
        
        //echo "<pre>"; print_r($sizes); die;

        return view('packages::size.index', compact('sizes', 'page_title', 'page_action','helper'));
   
    }

    /*
     * create  method
     * */

    public function create(Size $size, Request $request) 
    {        
        $page_title = 'Size';
        $page_action = 'Create Size';
         
        return view('packages::size.create', compact('categories','cat','category','size','sub_category_name', 'page_title', 'page_action'));
     }

    /*
     * Save Group method
     * */


   

    public function store(SizeRequest $request, Size $size) 
    {                       
        $vendor_id = $request->session()->get('current_vendor_id');
        //echo "<pre>"; print_r($size); die;
         
            DB::table('sizes')->insert(
                ['title' => $request->get('title'),                 
                 'status' => 1,
                 ]
            );
            //$size->save(); 

         
       
        return Redirect::to(route('size'))
                            ->with('flash_alert_notice', 'New Size was successfully created !');
    }
    /*
     * Edit Group method
     * @param 
     * object : $category
     * */

    public function edit(Size $size) {

        $page_title = 'Size';
        $page_action = 'Show Size';                         

        return view('packages::size.edit', compact( 'size', 'page_title', 'page_action'));
    }

    public function update(SizeRequest $request, Size $size) 
    {                                            
            
            DB::table('sizes')
                    ->where('id', $size->id)
                    ->update(['title' => $request->get('title'),
                            ]);
            //$size->save(); 
        
        return Redirect::to(route('size'))
                        ->with('flash_alert_notice', 'Size was  successfully updated !');
    }
    /*
     *Delete User
     * @param ID
     * 
     */
    public function destroy(Size $size) {
        
        Size::where('id',$size->id)->delete();

        return Redirect::to(route('size'))
                        ->with('flash_alert_notice', 'Size was successfully deleted!');
    }

    public function show(Size $size) {
        
    }

}
