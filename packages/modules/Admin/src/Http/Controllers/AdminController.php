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
use Cart;
use Illuminate\Support\Facades\DB;
//use Modules\Admin\src\Helpers\Helper as Help; 
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
        View::share('total_item',Cart::content()->count());
        View::share('sub_total',Cart::subtotal());
        
        View::share('cart',Cart::content());
        $pid = [];
        foreach (Cart::content() as $key => $value) {
            $pid[] = $value->id;
        }
        $product_photo =   DB::table('products')->select('photo','id')->whereIn('id',$pid)->get();//DB::table('products')->whereIn('id',$pid)->get(['photo','id'])->toArray();
        //print_r(Cart::content()); die;
        View::share('product_photo',$product_photo);
    }
    /*
    * Dashboard
    **/
    public function index(Request $request) 
    { 
        $page_title     = "Satıcı Paneli";
        $page_action    = "Veiw";
        $user           = User::count();
        $vendor_id = $request->session()->get('current_vendor_id');
        $product        = Product::where('created_by',$vendor_id)->count();
        $category       = Category::where('parent_id',0)->count();
        
        $order          =  Transaction::all()->count();
        $today_order    =  Transaction::whereDate('created_at', '=', date('Y-m-d'))->get()->count();
        if($request->session()->get('current_vendor_type') != 1){
            $order = Transaction::join('products', 'transactions.product_id', '=', 'products.id')->where('products.created_by',$vendor_id)->count();
            
            $today_order = Transaction::join('products', 'transactions.product_id', '=', 'products.id')->where('products.created_by',$vendor_id)->where('transactions.created_at', '>=', date('Y-m-d 00:00:00'))->count();
        }

        $viewPage       = "Admin";
        
        if($request->session()->get('current_vendor_type') == 1){
            return view('packages::dashboard.index_1',compact('today_order','order','category','product','user','page_title','page_action','viewPage','user_image'));
        }else{
            return view('packages::dashboard.index',compact('today_order','order','category','product','user','page_title','page_action','viewPage','user_image'));
        }
        
    }

   public function profile(Request $request,Admin $users)
   {
      
        $users = Admin::find(Auth::guard('admin')->user()->id);

        $page_title = "Profil";
        $page_action = "My Profile";
        $viewPage = "Admin";
        $method = $request->method();
        $msg = "Bilgilerinizi Güncelleyin!";
        $error_msg = [];
        if($request->method()==='POST'){
            $messages = ['password.regex' => "Your password must contain 1 lower case character 1 upper case character one number"];
                
        if($request->vendor_type){
                if($request->vendor_type == 1){ $company_name = '';} else if($request->vendor_type == 2) { $company_name = 'required';} else { $company_name = ''; }
                if($request->vendor_type == 1){ $manager_name = '';} else if($request->vendor_type == 2) { $manager_name = 'required';} else { $manager_name = ''; }
                if($request->vendor_type == 1){ $tax_name = '';} else if($request->vendor_type == 2) { $tax_name = 'required';} else { $tax_name = ''; }
                if($request->vendor_type == 1){ $tax_no = '';} else if($request->vendor_type == 2) { $tax_no = 'required';} else { $tax_no = ''; }
                if($request->vendor_type == 2){ $full_name = '';} else if($request->vendor_type == 1) { $full_name = 'required';} else { $full_name = ''; }
                if($request->vendor_type == 2){ $tc_no = '';} else if($request->vendor_type == 1) { $tc_no = 'required';} else { $tc_no = ''; }
                if($request->password) { $pass = 'required|min:6'; $pass_conf = 'required|same:password'; }else{ $pass = ''; $pass_conf = ''; }
                $validator = Validator::make($request->all(), [
                    'vendor_type'		=> 	'required',            
                    'full_name'		=> 	$full_name,
                    'tc_no'		=> 	$tc_no, 
                    'company_name'		=> 	$company_name,
                    'manager_name'		=> 	$manager_name,            
                    'city'		=> 	'required',  
                    'email'     =>  'required|email',
                    'phone'   => 'required|min:10|numeric',
                    'bank_name'		=> 	'required',
                    'tax_name'		=> 	$tax_name,
                    'tax_no'		=> 	$tax_no,
                    'iban'   => 'required|min:26',
                    'password' => $pass,
                    'password_confirmation' => $pass_conf
                ],[
                'vendor_type.required' => 'Satıcı tipini seçmelisiniz.',
                'city.required' => 'Şehir seçmelisiniz.',
                'email.required' => 'Geçerli bir eposta adresi girmelisiniz.',
                'email.unique' => 'Bu eposta adresine ait üyelik mevcut.',
                'phone.required' => 'Geçerli bir telefon no. girmelisiniz.',
                'bank_name.required' => 'Banka ismi girmelisiniz.',
                'iban.required' => 'IBAN no. girmelisiniz.',
                'password.required' => 'Şifre girmelisiniz.',
                'password_confirmation.required' => 'Şifrenizi onaylamak için tekrar girmelisiniz.',
                'company_name.required' => 'Firma ismini girmeniz gerekmektedir.',
                'manager_name.required' => 'Yetkili kişinin ismini gimelisiniz.',
                'tax_name.required' => 'Vergi dairesi ismini girmeniz gerekmektedir.',
                'tax_no.required' => 'Vergi no. girmeniz gerekmektedir.',
                'iban.min' => 'IBAN en az 26 karakter uzunluğunda olmalıdır.',
                'full_name.required' => 'Adınızı ve soyadınızı girmelisiniz.',
                'tc_no.required' => 'T.C. Kimlik numaranızı girmelisiniz.',
                ]);
        }else{
                $validator = Validator::make($request->all(), [
                        'full_name' => 'required',
                        'company_name' => 'required',
                        'phone' => 'required',
                        'email' => 'required|email',
                        'password' => 'min:6' 
                ]);
        }
        /** Return Error Message **/
        if ($validator->fails()) {

            $error_msg  =   $validator->messages()->all();
            
            
            //print_r($errors);die;            
        }else{
            
                if(!empty($request->file('image'))){
                    $image = $request->file('image');
                    $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/new/images/profile');
                    $image->move($destinationPath, $input['imagename']);
                    $users->image = $input['imagename'];
                    $request->session()->put('current_vendor_image',$users->image);
                }
                
                if($request->vendor_type == 1){
                    $users->full_name = $request->get('full_name');
                    $users->tc_no = $request->get('tc_no');    
                }
                if($request->vendor_type == 2){
                    $users->company_name = $request->get('company_name');
                    $users->manager_name = $request->get('manager_name');
                    $users->tax_name = $request->get('tax_name');
                    $users->tax_no = $request->get('tax_no');    
                }
                
                $users->bank_name = $request->get('bank_name');
                $users->phone = $request->get('phone');
                $users->address = $request->get('address');
                $users->city = $request->get('city');
                $users->country = $request->get('country');
                if($request->get('password') != ''){
                $users->password  =  Hash::make($request->get('password'));
                }                        
                
            
                $users->save();
                $method = $request->method();
                $msg    = "Bilgiler başarıyla güncellendi!";
            }
        } 
        
        if($request->session()->get('current_vendor_type') == 1){
            return view('packages::users.admin.index_1',compact('error_msg','method','users','page_title','page_action','viewPage'))->with('flash_alert_notice', $msg)->withInput($request->all());
        }else{
            return view('packages::users.admin.index',compact('error_msg','method','users','page_title','page_action','viewPage'))->with('flash_alert_notice', $msg)->withInput($request->all());
        }
        
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
