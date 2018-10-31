<?php
namespace Modules\Admin\Http\Controllers; 

use Modules\Admin\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;  
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Dispatcher; 
use Illuminate\Contracts\Encryption\DecryptException;
use App\Http\Requests\UserRequest;
use Auth;
use Input;
use Redirect; 
use Response;   
use Crypt; 
use View;
use Cookie;
use Closure; 
use Hash;
use URL;
use Lang;
use Validator;
use App\Http\Requests;
use App\Helpers\Helper as Helper;
use Modules\Admin\Models\User;
use Modules\Admin\Models\Product; 
use Modules\Admin\Models\Category; 
use Modules\Admin\Models\Transaction; 
use App\Admin;
use Illuminate\Http\Request;
use Session;
 
/**
 * Class : AdminController
 */
class AdminController extends Controller { 
    /**
     * @var  Repository
     */ 
    /**
     * Displays all admin.
     *
     * @return \Illuminate\View\View
     */ 
    protected $guard = 'admin';
    public function __construct()
    {  
        $this->middleware('admin');
        View::share('helper',new Helper);
    }
    /*
    * Dashboard
    **/
    public function index(Request $request) 
    { 
        $page_title     = "Dashboard";
        $page_action    = "Veiw";
        $user           = User::count();
        $vendor_id = $request->session()->get('current_vendor_id');
        $product        = Product::where('created_by',$vendor_id)->count();
        $category       = Category::where('parent_id',0)->count();
        
        $order          =  Transaction::all()->count();
        $today_order    =  Transaction::whereDate('created_at', '=', date('Y-m-d'))->get()->count();
        if($request->session()->get('current_vendor_type') != 1){
            $order = Transaction::join('products', 'transactions.product_id', '=', 'products.id')->where('products.created_by',$vendor_id)->count();
            
            $today_order = Transaction::join('products', 'transactions.product_id', '=', 'products.id')->where('products.created_by',$vendor_id)->where('transactions.created_at', '=', date('Y-m-d'))->count();
        }

        $viewPage       = "Admin";        
        return view('packages::dashboard.index',compact('today_order','order','category','product','user','page_title','page_action','viewPage','user_image'));
    }

   public function profile(Request $request,Admin $users)
   {
      
        $users = Admin::find(Auth::guard('admin')->user()->id);

        $page_title = "Profile";
        $page_action = "My Profile";
        $viewPage = "Admin";
        $method = $request->method();
        $msg = "Update your information!";
        $error_msg = [];
        if($request->method()==='POST'){
            $messages = ['password.regex' => "Your password must contain 1 lower case character 1 upper case character one number"];

            $validator = Validator::make($request->all(), [
                'full_name' => 'required',
                'company_name' => 'required',
                'phone' => 'required',
                'email' => 'required|email',
                'password' => 'min:6' 
        ]);
        /** Return Error Message **/
        if ($validator->fails()) {

            $error_msg  =   $validator->messages()->all(); 
        }
            
            if(!empty($request->file('image'))){
                $image = $request->file('image');
                $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/new/images/profile');
                $image->move($destinationPath, $input['imagename']);
                $users->image = $input['imagename'];
                $request->session()->put('current_vendor_image',$users->image);
            }
            
            $users->full_name = $request->get('full_name'); 
            $users->company_name = $request->get('company_name');
            $users->phone = $request->get('phone');
            $users->address = $request->get('address');
            $users->city = $request->get('city');
            $users->country = $request->get('country');
            if($request->get('password') != ''){
            $users->password  =  Hash::make($request->get('password'));
            }                        
            
        
            $users->save();
            $method = $request->method();
            $msg    = "Information successfully updated!";
        } 
       
        return view('packages::users.admin.index',compact('error_msg','method','users','page_title','page_action','viewPage'))->with('flash_alert_notice', $msg)->withInput($request->all());
   }
   public function errorPage()
   {
        $page_title = "Error";
        $page_action = "Error Page";
        $viewPage = "404 Error";
        $msg = "page not found";
        return view('packages::auth.page_not_found',compact('page_title','page_action','viewPage'))->with('flash_alert_notice', $msg);

   }  
}
