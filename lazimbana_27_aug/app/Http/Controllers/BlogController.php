<?php
 
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth; 
use Modules\Admin\Models\User;
use Modules\Admin\Models\Category;
use Modules\Admin\Models\Product;
use Modules\Admin\Models\Transaction;
use View;
use Html;
use URL; 
use Validator; 
use Paginate;
use Grids; 
use Form;
use Hash; 
use Lang;
use Session;
use DB;
use Route;
use Crypt;
use Redirect;
use Cart;
use Input;
use App\Helpers\Helper as Helper;
use Modules\Admin\Models\Settings;
 
class BlogController extends Controller
{
 
    public function __construct(Request $request,Settings $setting) {  
        View::share('helper',new Helper);
        View::share('category_name',$request->segment(1));
        View::share('total_item',Cart::content()->count());
        View::share('sub_total',Cart::subtotal()); 
        View::share('userData',$request->session()->get('current_user'));
        View::share('cart',Cart::content());
         
        $pid = [];
        foreach (Cart::content() as $key => $value) {
            $pid[] = $value->id;
        }
        $product_photo =   Product::whereIn('id',$pid)->get(['photo','id'])->toArray();
        View::share('product_photo',$product_photo);

        $website_title      = $setting::where('field_key','website_title')->first();
        $website_email      = $setting::where('field_key','website_email')->first();
        $website_url        = $setting::where('field_key','website_url')->first();
        $contact_number     = $setting::where('field_key','contact_number')->first();
        $company_address    = $setting::where('field_key','company_address')->first();

        $banner             = $setting::where('field_key','LIKE','%banner_image%')->get();


         View::share('website_title',$website_title);
         View::share('website_email',$website_email);
         View::share('website_url',$website_url);
         View::share('contact_number',$contact_number);
         View::share('company_address',$company_address);
          

        $base_page =  Route::currentRouteName();

        $path_info = explode('/', $request->getpathInfo());
        $md = ($setting::where('field_key','meta_description')->first());
        $mk = ($setting::where('field_key','meta_key')->first());
       
        
            $meta_description =  isset($md->field_value)?$md->field_value:'';
            $meta_key         =  isset($mk->field_value)?$mk->field_value:'';
        
 
        View::share('meta_description',$meta_description);
        View::share('meta_key',$meta_key);
        View::share('getpathInfo',$request->getpathInfo());
        
    }
    
    public function index (){
 
        $blogs = DB::table('blogs')
                ->orderBy('id', 'desc')
                ->get();
        //echo "<pre>"; print_r($blogs); die;
       return view('end-user.blog',compact('blogs'));   
 
    }
    
     public function detail ($id=Null){
 
        $blog = DB::table('blogs')
                ->where('slug', $id)
                ->first();
                
        $other_blog = DB::table('blogs')
                ->where('id', '!=' , $blog->id)
                ->get();
        //echo "<pre>"; print_r($other_blog); die;
        if($blog->meta_key){
            $meta_key = $blog->meta_key;
        }
        if($blog->meta_description){
            $meta_description = $blog->meta_description;
        }
       return view('end-user.blog-detail',compact('blog','other_blog','meta_key','meta_description'));   
 
    }
    
    
}