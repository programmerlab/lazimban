<?php
namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Dispatcher; 
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
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
use Validator;
use App\Http\Requests;
use App\Helpers\Helper as Helper;
use Modules\Admin\Models\User;
use Modules\Admin\Http\Requests\LoginRequest;
use App\Admin;
use App\iyzipay\configIyzipay;
 
class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = 'admin';
	protected $guard = 'admin';
    
    public function __construct()
    {          
        View::share('helper',new Helper);
    }
	 
	public function index(User $user, Request $request)
	{  
		//echo "<pre>";  print_r($request); die;
        if(Auth::guard('admin')->check()){  
    		return Redirect::to('admin');
    	}
        return view('packages::auth.login', compact('user'));
	}
 	/* Create Admin user
 	*/
 	public function registration(Request $request)
	{	
        $user = new Admin;    

        $table_cname = \Schema::getColumnListing('admin');
        $except = ['id','created_at','updated_at','password_confirmation'];
        $user->user_type=2;
        foreach ($table_cname as $key => $value) {
           
           if(in_array($value, $except )){
                continue;
           } 
            if($request->get($value) ){
                if($value=='password'){
                  $user->$value = Hash::make($request->get($value));  
              }else{
                $user->$value = $request->get($value);
              }
                
           }
        } 

        //Server side valiation
        $validator = Validator::make($request->all(), [
            'vendor_type'		=> 	'required',
           	'full_name'		=> 	'required',
            'company_name'		=> 	'required',
            'email'     =>  'required|email|unique:admin',
            'phone'   => 'required|min:10|numeric',
            'iban'   => 'required|min:26',
	        'password' => 'required|min:6',
	        'password_confirmation' => 'required|same:password'
        ]);
        /** Return Error Message **/
        if ($validator->fails()) {
                   	$error_msg	=	[];
                   	$errors = new \StdClass;
	        foreach ( $validator->messages()->messages() as $key => $value) {
	        			  	$errors->$key= $value[0]	;
    		}
            
            //print_r($errors);die;
            return redirect()->back()->withInput()->with('message', $errors);
         	
        }   
        /** --Create admin-- **/
        $user->save();
        
        //****** register vendor for market place ********
        if($user->user_type == 2){
            $options = configIyzipay::options();
                        
            $req = new \Iyzipay\Request\CreateSubMerchantRequest();
            $req->setLocale(\Iyzipay\Model\Locale::TR);
            $req->setConversationId(time().uniqid());
            $req->setSubMerchantExternalId("Vendor_".$user->id);
            
            if($user->vendor_type == 1){
                $req->setSubMerchantType(\Iyzipay\Model\SubMerchantType::PERSONAL);    
            }
            
            if($user->vendor_type == 2){
                $req->setSubMerchantType(\Iyzipay\Model\SubMerchantType::PRIVATE_COMPANY);
                $req->setTaxOffice(($request->company_name) ? $request->company_name.' Tax Office' : 'Tax Office');
                $req->setLegalCompanyTitle(($request->company_name) ? $request->company_name : 'Not Available');
            }
            
            $req->setAddress(($request->address) ? $request->address : 'Not Available');
            $req->setContactName($request->full_name);
            $req->setContactSurname($request->full_name);
            $req->setEmail($request->email);
            $req->setGsmNumber(($request->phone) ? $request->phone : '9999999999');
            $req->setName($request->full_name);
            $req->setIban($request->iban); //TR330006100519786457841326
            $req->setIdentityNumber("ID_".$user->id);
            $req->setCurrency(\Iyzipay\Model\Currency::TL);
            //echo "<pre>"; print_r($req); die;
            $subMerchant = \Iyzipay\Model\SubMerchant::create($req, $options);
            
            if($subMerchant->getStatus() == 'success'){
                $user->vendor_key = $subMerchant->getSubMerchantKey();
                $user->save();
            }
            
            //echo "<pre>"; print_r($subMerchant); die;
        }
        //************************************************
		return view::make('packages::auth.signup-success');
	} 

	public function signUp( Request $request,User $user)
	{	 
        if($request->method()=='POST'){
            return redirect()
                            ->back()
                            ->withInput()  
                            ->withErrors(['errors'=>$errors]); 
        }
		return view::make('packages::auth.register', compact('user','errors1'));
	} 
	
	public function logout(Request $request){
        $vendor_type = ($request->session()->get('current_vendor_type'));
		Auth::logout();
		auth()->guard('admin')->logout();
        if($vendor_type == 1){
            return redirect('admin/login');    
        }else{
            return redirect('vendor/signUp');
        }		
	}
    
    
	public function login(Request $request)
	{
        
		$credentials = array('email' => Input::get('email'), 'password' => Input::get('password')); 
        if (Auth::attempt($credentials, true)) {
            return Redirect::to('admin');
        } 
	}

 
}