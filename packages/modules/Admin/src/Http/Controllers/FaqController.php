<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\FaqRequest;
use Modules\Admin\Models\User;
use Modules\Admin\Models\Faq;
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
class FaqController extends Controller {
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
        View::share('viewPage', 'faq');
        View::share('helper',new Helper);
        $this->record_per_page = Config::get('app.record_per_page');
    }

    protected $categories;

    /*
     * Dashboard
     * */

    public function index(Faq $faq, Request $request) 
    { 
       $page_title = 'Faq';
        $page_action = 'View Faq'; 
        if ($request->ajax()) {
            $id = $request->get('id'); 
            $category = Faq::find($id); 
            $category->status = $s;
            $category->save();
            echo $s;
            exit();
        }
         
        $vendor_id = $request->session()->get('current_vendor_id');
        
        if($request->session()->get('current_vendor_type') != 1){
            $faqs = $faq->where('user_id',$vendor_id)->orderBy('id','desc')->Paginate($this->record_per_page);
        }else{
            $faqs = $faq->orderBy('id','desc')->Paginate($this->record_per_page);
        }
        
        //echo "<pre>"; print_r($faqs); die;

        return view('packages::faq.index', compact('faqs', 'page_title', 'page_action','helper'));
   
    }

    /*
     * create  method
     * */

    public function create(Faq $faq, Request $request) 
    {        
        $page_title = 'Faq';
        $page_action = 'Create Question';
         
        return view('packages::faq.create', compact('categories','cat','category','faq','sub_category_name', 'page_title', 'page_action'));
     }

    /*
     * Save Group method
     * */


   

    public function store(FaqRequest $request, Faq $faq) 
    {
        
        $vendor_id = $request->session()->get('current_vendor_id');
        //echo "<pre>"; print_r($faq); die;
                    
            $faq->title      =   $request->get('title');
            if($request->get('slug') && !empty($request->get('slug'))){               
                $pro_slug   = strtolower(str_replace(" ", "-", $request->get('slug')));
                $url        = $pro_slug;  
            }else{                
                $pro_slug   = strtolower(str_replace(" ", "-", $request->get('title')));
                $url        = $pro_slug;
            }
            //echo $photo_name; die;            
            
            //echo "<pre>"; print_r($faq); die;
            DB::table('faq')->insert(
                ['title' => $request->get('title'),
                 'description' => $request->get('description'),                 
                 'meta_key'           =>   $request->get('meta_key'),
                 'meta_description'   =>   $request->get('meta_description'),
                 'user_id' => 1,
                 'slug' => $url,
                 ]
            );
            //$faq->save(); 

        
       
        return Redirect::to(route('faq'))
                            ->with('flash_alert_notice', 'New Question was successfully created !');
    }
    /*
     * Edit Group method
     * @param 
     * object : $category
     * */

    public function edit(Faq $faq) {

        $page_title = 'Faq';
        $page_action = 'Show Faq';                         

        return view('packages::faq.edit', compact( 'faq', 'page_title', 'page_action'));
    }

    public function update(FaqRequest $request, Faq $faq) 
    {        
                            
            $faq->title      =   $request->get('title');
            if($request->get('slug') && !empty($request->get('slug'))){                
                $pro_slug   = strtolower(str_replace(" ", "-", $request->get('slug')));
                $url        = $pro_slug;  
            }else{                
                $pro_slug   = strtolower(str_replace(" ", "-", $request->get('title')));
                $url        = $pro_slug;
            }
            
            $faq->description        =   $request->get('description');            
            
            //echo "<pre>"; print_r($faq); die;
            if($request->get('title')){
                $faq->title  = $request->get('title');
            }
            
            //echo $request->get('meta_key');die;
            DB::table('faq')
                    ->where('id', $faq->id)
                    ->update(['title' => $request->get('title'),
                                'description' => $request->get('description'),                                
                                'slug' => $url                                
                                ]);
            //$faq->save(); 
        
        return Redirect::to(route('faq'))
                        ->with('flash_alert_notice', 'Question was  successfully updated !');
    }
    /*
     *Delete User
     * @param ID
     * 
     */
    public function destroy(Faq $faq) {
        
        Faq::where('id',$faq->id)->delete();

        return Redirect::to(route('faq'))
                        ->with('flash_alert_notice', 'Question was successfully deleted!');
    }

    public function show(Blog $faq) {
        
    }

}
