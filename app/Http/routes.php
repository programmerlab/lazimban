<?php
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::match(['post','get'],'cat','HomeController@index');

 


Route::get('{name}/addToCart/{id}', [ 
        'as' => 'addCart',
       'uses' =>   'ProductController@addToCart'
       ]);

Route::get('blogs', [ 
        'as' => 'blogs',
       'uses' =>   'BlogController@index'
       ]);
Route::get('blog', [ 
        'as' => 'blogs',
       'uses' =>   'BlogController@index'
       ]);
Route::get('blog-detail/{id}', [ 
        'as' => 'blog-detail',
       'uses' =>   'BlogController@detail'
       ]);

Route::get('makale/{slug}', [ 
        'as' => 'blog-detail',
       'uses' =>   'BlogController@detail'
       ]);
 
Route::get('myaccount/login',[
          'as' => 'showLoginForm',
          'uses'  => 'ProductController@showLoginForm'
        ])->where(['name'=>'myaccount','name'=>'[A-Za-z]+']); 


Route::get('myaccount/forgetPassword',[
          'as' => 'showLoginForm',
          'uses'  => 'ProductController@sendResetPasswordLink'
        ])->where(['name'=>'myaccount','name'=>'[A-Za-z]+']);

Route::get('hesabim/giris',[
          'as' => 'showLoginForm',
          'uses'  => 'ProductController@showLoginForm'
        ])->where(['name'=>'myaccount','name'=>'[A-Za-z]+']); 



Route::post('password/email','ProductController@forgetPasswordLink');


Route::match(['get','post'],'myaccount/resetPassword','ProductController@resetPassword');

Route::get('password/reset','ProductController@sendResetPasswordLink');

Route::get('sifre/sifirla','ProductController@sendResetPasswordLink');  




Route::get('checkout',[
          'as' => 'checkout',
          'uses'  => 'HomeController@checkout'
        ]);

Route::post('submitComment',[
          'as' => 'submitComment',
          'uses'  => 'HomeController@submitComment'
        ]); 

Route::get('addReview',[
          'as' => 'addReview',
          'uses'  => 'HomeController@addReview'
        ]); 



Route::get('home',[
          'as' => 'home',
          'uses'  => 'HomeController@home'
        ]);
Route::get('category',[
          'as' => 'category-front',
          'uses'  => 'HomeController@category'
        ]); 
 //Route::get('order',[
 //         'as' => 'order',
 //         'uses'  => 'ProductController@order'
 //       ]);
 Route::get('siparis',[
          'as' => 'order',
          'uses'  => 'ProductController@order'
        ]); 
  Route::get('SSS',[
          'as' => 'faqs',
          'uses'  => 'HomeController@faq'
        ]); 
  
   Route::get('Yardım-Merkezi',[
          'as' => 'contact',
          'uses'  => 'HomeController@contact'
        ]);
   Route::post('contactus',[
          'as' => 'contactus',
          'uses'  => 'HomeController@contact_us'
        ]);
   Route::post('enquiry',[
          'as' => 'contactus',
          'uses'  => 'HomeController@enquiry'
        ]);
   Route::get('track-orders',[
          'as' => 'trackOrder',
          'uses'  => 'HomeController@trackOrder'
        ]); 
   Route::get('terms-conditions',[
          'as' => 'trackOrder',
          'uses'  => 'HomeController@tNc'
        ]); 
 
    
    Route::get('Gizlilik-Politikası',[
          'as' => 'privacy',
          'uses'  => 'HomeController@privacy_policy'
        ]);
     Route::get('Teslimat-Ve-Iadeler',[
          'as' => 'returns',
          'uses'  => 'HomeController@returns'
        ]);
     Route::get('Mesafeli-Satış-Sözleşmesi',[
          'as' => 'contract',
          'uses'  => 'HomeController@sales_contract'
        ]);
    Route::get('sayfa/{slug}',[
          'as' => 'about',
          'uses'  => 'HomeController@page'
        ]);
    Route::get('Hakkimizda',[
          'as' => 'about',
          'uses'  => 'HomeController@about_us'
        ]);


Route::group(['middleware' => ['web']], function(){



  Route::get('/',[
          'as' => 'homePage',
          'uses'  => 'ProductController@showProduct'
        ]);
  
   
   
  Route::get('/cart', [ 
        'as' => '',
       'uses' =>   'ProductController@index'
       ]);

Route::get('checkout',[
          'as' => 'checkout',
          'uses'  => 'ProductController@checkout'
        ]); 


  Route::get('/updateCart', [ 
        'as' => '',
       'uses' =>   'ProductController@updateCart'
       ]);

  Route::get('/product', [  
        'as' => '',
       'uses' =>   'ProductController@showProduct'
       ]);

  Route::get('/clear-cart',[  
        'as' => '',
       'uses' =>  'ProductController@clearCart'
       ]);

  Route::get('/getProduct',[  
        'as' => '',
       'uses' =>  'ProductController@getProduct'
       ]);




    Route::get('{name}/buyNow/{id}', [ 
        'as' => '',
       'uses' =>   'ProductController@buyNow'
       ]);


  Route::get('/removeItem/{id}',[ 
        'as' => '',
       'uses' =>  'ProductController@removeItem'
       ]);
  Route::get('auth/logout', 'Auth\AuthController@getLogout');

  Route::get('register',[
          'as' => 'register',
          'uses'  => 'UserController@register'
        ]);    

  Route::post('register',[
          'as' => 'register',
          'uses'  => 'UserController@signup'
        ]);   

  Route::post('signup',[
          'as' => 'signup',
          'uses'  => 'UserController@signup'
        ]);
  Route::post('updateProfile',[
          'as' => 'updateProfile',
          'uses'  => 'UserController@update'
        ]);
    Route::post('updateBilling',[
          'as' => 'updateBilling',
          'uses'  => 'UserController@updateBilling'
        ]);
    Route::post('updateShipping',[
          'as' => 'updateShipping',
          'uses'  => 'UserController@updateShipping'
        ]);



  Route::get('login',[
          'as' => 'showLoginForm',
          'uses'  => 'ProductController@showLoginForm'
        ])->where(['name'=>'myaccount','name'=>'[A-Za-z]+']); 






Route::post('billing',[
          'as' => 'billing',
          'uses'  => 'ProductController@billing'
        ]);

Route::post('shipping',[
          'as' => 'shipping',
          'uses'  => 'ProductController@shipping'
        ]);

Route::post('shippingMethod',[
          'as' => 'shippingMethod',
          'uses'  => 'ProductController@shippingMethod'
        ]);

Route::post('placeOrder',[
          'as' => 'placeOrder',
          'uses'  => 'ProductController@placeOrder'
        ]);


Route::get('orderSuccess',[
          'as' => 'orderSuccess',
          'uses'  => 'ProductController@thankYou'
        ]);


Route::get('card',[
          'as' => 'card',
          'uses'  => 'ProductController@card'
        ]);

Route::post('card_callback',[
          'as' => 'card_callback',
          'uses'  => 'ProductController@card_callback'
        ]);

Route::get('success',[
          'as' => 'success',
          'uses'  => 'ProductController@thankYou1'
        ]);


Route::get('signout', function(App\User $user , Illuminate\Http\Request $request) { 
    
    $request->session()->forget('current_user');
    $request->session()->flush();  

    return redirect()->intended('/'); 

});
   



Route::get('myaccount',[
          'as' => 'myaccount',
          'uses'  => 'ProductController@myaccount'
        ]); 
Route::get('hesabim',[
          'as' => 'myaccount',
          'uses'  => 'ProductController@myaccount'
        ]); 
 
        
Route::get('myaccount/signup',[
          'as' => 'myaccount-signup',
          'uses'  => 'ProductController@showSignupForm'
        ]); 

Route::post('myaccount/signup',[
          'as' => 'userSignup',
          'uses'  => 'UserController@userSignup'
        ]);
Route::get('hesabim/kaydol',[
          'as' => 'myaccount-signup',
          'uses'  => 'ProductController@showSignupForm'
        ]); 

Route::post('hesabim/kaydol',[
          'as' => 'userSignup',
          'uses'  => 'UserController@userSignup'
        ]); 

Route::post('filter_content',[
          'as' => 'filter_content',
          'uses'  => 'HomeController@filter_content'
        ]);        
        
Route::get('{subCategoryName}/{productName}',[
          'as' => 'productName',
          'uses'  => 'HomeController@productDetail'
        ]); 

Route::get('{name}',[
          'as' => 'productcategory',
          'uses'  => 'HomeController@mainCategory'
        ]);

Route::get('{category}/{name}',[
          'as' => 'productcategoryByname', 
          'uses'  => 'HomeController@productCategory'
        ]);

Route::post('check_variation',[
          'as' => 'check_variation',
          'uses'  => 'HomeController@check_variation'
        ]);
Route::post('check_variation_size',[
          'as' => 'check_variation_size',
          'uses'  => 'HomeController@check_variation_size'
        ]);



Route::post('login',function(App\User $user , Illuminate\Http\Request $request){ 

      $credentials = ['email' => Input::get('email'), 'password' => Input::get('password')];
      
      $check = DB::table('admin')->select('*')->where('email',Input::get('email'))->first();
      //print_r($check); die;
      
      if(!empty($check)){
            if (Hash::check(Input::get('password'), $check->password))
              {
                         $auth = auth()->guard('admin');
                         $credentials2 = ['email' => Input::get('email'), 'password' => Input::get('password'),'user_type'=>2,'status'=>1];
                         if ($auth->attempt($credentials2)) {
                            $vendor = DB::table('admin')->where('email', Input::get('email'))->first();
                          
                                $request->session()->put('current_vendor_id',$vendor->id);
                                $request->session()->put('current_vendor_name',$vendor->full_name);
                                $request->session()->put('current_vendor_image',$vendor->image);
                                $request->session()->put('current_vendor_type',2);
                                //print_r($vendor->id); die;
                            return Redirect::to('bana-ozel/satici-paneli');
                         }else{
                             return redirect()
                                ->back()
                                ->withInput()  
                                ->withErrors(['message'=>'Geçersiz eposta yada şifre. Lütfen tekrar deneyin!']);
                         }
                         
                          
              }else{
                    return redirect()
                            ->back()
                            ->withInput()  
                            ->withErrors(['message'=>'Geçersiz eposta yada şifre. Lütfen tekrar deneyin!']);
              }
        }else{
            // user login
            if (Auth::attempt($credentials)) {
               $request->session()->put('current_user',Auth::user());
               
                  return redirect()->intended('/'); 
            }else{  
                return redirect()
                            ->back()
                            ->withInput()  
                            ->withErrors(['message'=>'Geçersiz eposta yada şifre. Lütfen tekrar deneyin!']);
                }
        }
      }); 
             



Route::post('Ajaxlogin',function(App\User $user , Illuminate\Http\Request $request){ 
       
      $credentials = ['email' => Input::get('email'), 'password' => Input::get('password')];  
        if (Auth::attempt($credentials)) {
             $request->session()->put('current_user',Auth::user());
             $request->session()->put('tab',1);
             
             if($request->ajax()){
                return  json_encode(['msg'=>'success','code'=>200,'data'=>Auth::user()]); 
            }
              return Redirect::to(URL::previous());
               // 
          }else{  
               return  json_encode(['msg'=>'Invalid email or password','code'=>500,'data'=>$request->all()]); 
               //return Redirect::to(url()->previous());
              } 
      }); 
             

 });