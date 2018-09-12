<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Modules\Admin\Models\ShippingBillingAddress;
use Input;
use Validator;
use Auth;
use Form;
use Hash;
use View;
use URL;
use Route;
use Crypt;
use Response;
use App\User;
use JWTAuth;
use Session;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

   	public function index(Request $request)
    {  		
    	//dd( $request->session()->get('current_user'));
         return view('welcome');
    }
    /* @method : login
    * @param : email,password and deviceID
    * Response : json
    * Return : token and user details
    * Author : kundan Roy   
    */
    public function login(Request $request)
    {    
        $input = $request->all();
        if (!Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])) {
            return response()->json([ "status"=>0,"message"=>"Invalid email or password. Try again!" ,'data' => '' ]);
        }
        $data = Auth::user();
        return Redirect::to('/');
    } 

    public function signup(Request $request,User $user)
    {   
		$input['first_name'] 	= $request->input('first_name');
        $input['last_name'] 	= $request->input('last_name');
    	$input['email'] 		= $request->input('email'); 
    	$input['password'] 	    = Hash::make($request->input('password'));
    	

        //Server side valiation
        $validator = Validator::make($request->all(), [
           	'first_name'		=> 	'required',
            'last_name'		=> 	'required',
            'email'     =>  'required|email|unique:users',
	        'password' => 'required|min:6',
	        'confirm_password' => 'required|same:password'
        ]);
        /** Return Error Message **/
        if ($validator->fails()) {
                   	$error_msg	=	[];
	        foreach ( $validator->messages()->messages() as $key => $value) {
	        			  $error_msg[$key] = $value[0];
	        		}
	      
          	return Response::json(array(
	          	'status' => 0,
	            'message' => $error_msg,
	            'data'	=>	''
	            )
          	);
        }   
        /** --Create USER-- **/
        $user = User::create($input); 
       
        if($user) 
        {
             $credentials = ['email' => Input::get('email'), 'password' => Input::get('password')];  
        
            if (Auth::attempt($credentials)) {
                 $request->session()->put('current_user',Auth::user());
                 $request->session()->put('tab',1);
                    return response()->json(
                            [ 
                                "status"=>1,
                                "code" => 200,
                                "message"=>"Thank you for registration.",
                                'data'=>$user
                            ]
                        );
              }  
        } 
    }

    public function userSignup(Request $request,User $user)
    {   
        $input['first_name']    = $request->input('first_name');
        $input['last_name']    = $request->input('last_name');  
        $input['email']         = $request->input('email'); 
        $input['password']      = Hash::make($request->input('password'));
        

        //Server side valiation
        $validator = Validator::make($request->all(), [
            'first_name'        =>  'required',
            'last_name'		=> 	'required',
            'email'     =>  'required|email|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ],[
		'first_name.required'=>'Adınızı girmeniz gerekmektedir.',
		'last_name.required'=>'Soyadınızı girmeniz gerekmektedir.',
		'email.required'=>'Eposta adresi girmeniz gerekmektedir.',
		'password.required'=>'Şifre belirlemeniz gerekmektedir.',
		'confirm_password.required'=>'Şifrenizi tekrar girmeniz gerekmektedir.',
		]);
        /** Return Error Message **/
        if ($validator->fails()) {
                    $error_msg  =   [];
            foreach ( $validator->messages()->messages() as $key => $value) {
                          $error_msg[$key] = $value[0];
                    }
          
              return redirect()
                          ->back()
                          ->withInput()  
                          ->withErrors(['message'=>$error_msg]);
        }else{
                $user = User::create($input); 
       
                $credentials = ['email' => Input::get('email'), 'password' => Input::get('password')];  
            
                if (Auth::attempt($credentials)) {
                     $request->session()->put('current_user',Auth::user()); 
                     return redirect()
                          ->back()
                          ->withInput()  
                          ->withErrors(['message'=>'success']);
                        
                  }  
            }  
        
    }
    
    public function update(Request $request,User $user)
    {   
		$input['first_name']    = $request->input('first_name');
        $input['last_name']    = $request->input('last_name');  
        $input['email']         = $request->input('email'); 
        $input['password']      = Hash::make($request->input('password'));
        
        if($request->input('password')){
            $validator = Validator::make($request->all(), [
                'first_name'        =>  'required',
                'last_name'		=> 	'required',
                //'email'     =>  'required|email|unique:users',
                'password' => 'required|min:6',
                'confirm_password' => 'required|same:password'
            ]);
        }else{
            $validator = Validator::make($request->all(), [
                'first_name'        =>  'required',
                'last_name'		=> 	'required'                
            ]); 
        }
        //Server side valiation
         $request->session()->put('tab',0);
        /** Return Error Message **/
        if ($validator->fails()) {
                    $error_msg  =   [];
            foreach ( $validator->messages()->messages() as $key => $value) {
                          $error_msg[$key] = $value[0];
                    }
                //print_r($error_msg); die;
              return redirect()
                          ->back()
                          ->withInput()  
                          ->withErrors(['message'=>$error_msg]);
        }else{
                //$user = User::create($input); 
                $this->user_id = $request->session()->get('current_user')->id;
                //$credentials = ['email' => Input::get('email'), 'password' => Input::get('password')];
                if($request->input('password')){
                    DB::table('users')
                        ->where('id', $this->user_id)
                        ->update(['first_name' => $input['first_name'],
                                  'last_name' => $input['last_name'],
                                  'password' => $input['password']
                                  ]);
                }else{
                    DB::table('users')
                        ->where('id', $this->user_id)
                        ->update(['first_name' => $input['first_name'],
                                  'last_name' => $input['last_name']                                  
                                  ]);
                }
                
                $request->session()->put('current_user',Auth::user()); 
                     
                    return redirect()->back()->withInput()->with('message', 'Updated successfully');
                        
                
            }
           
    }
    
    
    public function updateBilling(ShippingBillingAddress $shipBill, Request $request)
    {
       $this->user_id = $request->session()->get('current_user')->id;
        $bill =  ShippingBillingAddress::where('user_id',$this->user_id)->where('address_type',1)->first();

        if($bill) 
        {
            $shipBill = ShippingBillingAddress::find($bill->id);
        }
        
        $shipBill->name     = $request->get('name');
        $shipBill->company_name     = $request->get('company_name');
        $shipBill->tax1     = $request->get('tax1');
        $shipBill->tax2     = $request->get('tax2');
        $shipBill->email    = $request->get('email');
        $shipBill->mobile   = $request->get('mobile');
        $shipBill->address1 = $request->get('address1');
        $shipBill->address2 = $request->get('address2');
        $shipBill->zip_code = $request->get('zip_code');
        $shipBill->city     = $request->get('city');
        $shipBill->state    = $request->get('state');
        $shipBill->user_id  = $this->user_id;
        $shipBill->address_type = 1; 
 
        $shipBill->save();
        //print_r($request->get('same_billing')); die;        
        $request->session()->put('tab',1);
        return redirect()->back()->withInput()->with('message', 'Updated successfully');


    }
    
    public function updateShipping(ShippingBillingAddress $shipBill, Request $request)
    {
        $this->user_id = $request->session()->get('current_user')->id;
        $shipping = ShippingBillingAddress::where('user_id',$this->user_id)->where('address_type',2)->first();

        if($shipping) 
        {
            $shipBill = ShippingBillingAddress::find($shipping->id);
        }
        //echo "<pre>"; print_r($shipBill); die;
        $shipBill->name     = $request->get('name');
        $shipBill->company_name     = $request->get('company_name');
        $shipBill->tax1     = $request->get('tax1');
        $shipBill->tax2     = $request->get('tax2');
        $shipBill->email    = $request->get('email');
        $shipBill->mobile   = $request->get('mobile');
        $shipBill->address1 = $request->get('address1');
        $shipBill->address2 = $request->get('address2');
        $shipBill->zip_code = $request->get('zip_code');
        $shipBill->city     = $request->get('city');
        $shipBill->state    = $request->get('state');
        $shipBill->user_id  = $this->user_id;
        $shipBill->address_type = 2;  
        $shipBill->save();
        $request->session()->put('shipping',$shipBill);
        $request->session()->put('tab',2);
         return redirect()->back()->withInput()->with('message', 'Updated successfully');
        
    }
    
    public function register(Request $request)
    {  
        return view('auth.register');
    }

    public function showLoginForm(Request $request)
    {  
        return view('auth.login');
    }
}