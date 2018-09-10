<?php
use Illuminate\Support\Facades\DB;
      Route::get('vendor/login','Modules\Admin\Http\Controllers\AuthController@index');
      Route::get('admin/login','Modules\Admin\Http\Controllers\AuthController@index');
      Route::get('logout','Modules\Admin\Http\Controllers\AuthController@logout');  
      Route::get('admin/signUp','Modules\Admin\Http\Controllers\AuthController@signUp');
      Route::get('vendor/signUp','Modules\Admin\Http\Controllers\AuthController@signUp');
      Route::get('satici/giris-kayit','Modules\Admin\Http\Controllers\AuthController@signUp');
      
      Route::get('admin/transaction/approve/{id}','Modules\Admin\Http\Controllers\TransactionController@approve');
      Route::get('admin/transaction/decline/{id}','Modules\Admin\Http\Controllers\TransactionController@decline');
      
      Route::get('admin/products','Modules\Admin\Http\Controllers\ProductController@index');
      Route::post('admin/products','Modules\Admin\Http\Controllers\ProductController@index');
       
      Route::post('admin/registration','Modules\Admin\Http\Controllers\AuthController@registration');
      
      Route::post('admin/category/save_menu','Modules\Admin\Http\Controllers\CategoryController@save_menu');
      
      Route::post('admin/login',function(App\Admin $user , Illuminate\Http\Request $request){
        //echo "<pre>"; print_r($user); die;
        $credentials = ['email' => Input::get('email'), 'password' => Input::get('password'),'user_type'=>1]; 
            $auth = auth()->guard('admin');

        $credentials2 = ['email' => Input::get('email'), 'password' => Input::get('password'),'user_type'=>2,'status'=>1]; 
            $auth = auth()->guard('admin');
            
            if ($auth->attempt($credentials)) {
                    $vendor = DB::table('admin')->where('email', Input::get('email'))->first();                
                    $request->session()->put('current_vendor_id',$vendor->id);
                    $request->session()->put('current_vendor_name',$vendor->full_name);
                    $request->session()->put('current_vendor_image',$vendor->image);
                    $request->session()->put('current_vendor_type',1);
                return Redirect::to('admin');
            }if ($auth->attempt($credentials2)) {
                    $vendor = DB::table('admin')->where('email', Input::get('email'))->first();                
                    $request->session()->put('current_vendor_id',$vendor->id);
                    $request->session()->put('current_vendor_name',$vendor->full_name);
                    $request->session()->put('current_vendor_image',$vendor->image);
                    $request->session()->put('current_vendor_type',2);
                return Redirect::to('admin');
            }
            else{ 
                return redirect()
                            ->back()
                            ->withInput()  
                            ->withErrors(['message'=>'Invalid email or password. Try again!']);
                } 
        }); 
      
    Route::group(['middleware' => ['admin']], function () { 

        Route::get('admin', 'Modules\Admin\Http\Controllers\AdminController@index');
        
        
        /*------------User Model and controller---------*/

        Route::bind('user', function($value, $route) {
            return Modules\Admin\Models\User::find($value);
        });
        

        Route::resource('admin/user', 'Modules\Admin\Http\Controllers\UsersController', [
            'names' => [
                'edit' => 'user.edit',
                'show' => 'user.show',
                'destroy' => 'user.destroy',
                'update' => 'user.update',
                'store' => 'user.store',
                'index' => 'user',
                'create' => 'user.create',
            ]
                ]
        );
        
        
        
        Route::resource('admin/vendor', 'Modules\Admin\Http\Controllers\VendorsController', [
            'names' => [
                'edit' => 'vendor.edit',
                'show' => 'vendor.show',
                'destroy' => 'vendor.destroy',
                'update' => 'vendor.update',
                'store' => 'vendor.store',
                'index' => 'vendor',
                'create' => 'vendor.create',
            ]
                ]
        );
        /*---------End---------*/   
  
        /*------------User Category and controller---------*/

            Route::bind('category', function($value, $route) {
                return Modules\Admin\Models\Category::find($value);
            });
     
            Route::resource('admin/category', 'Modules\Admin\Http\Controllers\CategoryController', [
                'names' => [
                    'edit' => 'category.edit',
                    'show' => 'category.show',
                    'destroy' => 'category.destroy',
                    'update' => 'category.update',
                    'store' => 'category.store',
                    'index' => 'category',
                    'create' => 'category.create',                    
                ]
                    ]
            );
        /*---------End---------*/   


        /*------------User Category and controller---------*/

            Route::bind('sub-category', function($value, $route) {
                return Modules\Admin\Models\SubCategory::find($value);
            });
     
            Route::resource('admin/sub-category', 'Modules\Admin\Http\Controllers\SubCategoryController', [
                'names' => [
                    'edit' => 'sub-category.edit',
                    'show' => 'sub-category.show',
                    'destroy' => 'sub-category.destroy',
                    'update' => 'sub-category.update',
                    'store' => 'sub-category.store',
                    'index' => 'sub-category',
                    'create' => 'sub-category.create',
                ]
                    ]
            );
        /*---------End---------*/    

        Route::bind('product', function($value, $route) {
            return Modules\Admin\Models\Product::find($value);
        });
 
        Route::resource('admin/product', 'Modules\Admin\Http\Controllers\ProductController', [
            'names' => [
                'edit' => 'product.edit',
                'show' => 'product.show',
                'destroy' => 'product.destroy',
                'update' => 'product.update',
                'store' => 'product.store',
                'index' => 'product',
                'create' => 'product.create',
            ]
                ]
        ); 

        Route::bind('transaction', function($value, $route) {
            return Modules\Admin\Models\Transaction::find($value);
        });
 
        Route::resource('admin/transaction', 'Modules\Admin\Http\Controllers\TransactionController', [
            'names' => [
                'edit' 		=> 'transaction.edit',
                'show' 		=> 'transaction.show',
                'destroy' 	=> 'transaction.destroy',
                'update' 	=> 'transaction.update',
                'store' 	=> 'transaction.store',
                'index' 	=> 'transaction',
                'create' 	=> 'transaction.create',                
            ]
                ]
        ); 

        Route::bind('setting', function($value, $route) {
            return Modules\Admin\Models\Settings::find($value);
        });
 
        Route::resource('admin/setting', 'Modules\Admin\Http\Controllers\SettingsController', [
            'names' => [
                'edit'      => 'setting.edit',
                'show'      => 'setting.show',
                'destroy'   => 'setting.destroy',
                'update'    => 'setting.update',
                'store'     => 'setting.store',
                'index'     => 'setting',
                'create'    => 'setting.create',
            ]
                ]
        ); 


          Route::bind('page', function($value, $route) {
            return Modules\Admin\Models\Pages::find($value);    
        });
 
        Route::resource('admin/page', 'Modules\Admin\Http\Controllers\PageController', [
            'names' => [
                'edit'      => 'page.edit',
                'show'      => 'page.show',
                'destroy'   => 'page.destroy',
                'update'    => 'page.update',
                'store'     => 'page.store',
                'index'     => 'page',
                'create'    => 'page.create',
            ]
                ]
        ); 


         Route::bind('category-dashboard', function($value, $route) {
                return Modules\Admin\Models\CategoryDashboard::find($value);
            });
     
            Route::resource('admin/category-dashboard', 'Modules\Admin\Http\Controllers\CategoryDashboardController', [
                'names' => [
                    'edit' => 'category-dashboard.edit',
                    'show' => 'category-dashboard.show',
                    'destroy' => 'category-dashboard.destroy',
                    'update' => 'category-dashboard.update',
                    'store' => 'category-dashboard.store',
                    'index' => 'category-dashboard',
                    'create' => 'category-dashboard.create',
                ]
                    ]
            );
            
        
        Route::bind('blog', function($value, $route) {
            return Modules\Admin\Models\Blog::find($value);
        });
 
        Route::resource('admin/blog', 'Modules\Admin\Http\Controllers\BlogController', [
            'names' => [
                'edit' => 'blog.edit',
                'show' => 'blog.show',
                'destroy' => 'blog.destroy',
                'update' => 'blog.update',
                'store' => 'blog.store',
                'index' => 'blog',
                'create' => 'blog.create',
            ]
                ]
        ); 

 
        Route::match(['get','post'],'admin/profile', 'Modules\Admin\Http\Controllers\AdminController@profile'); 
            
  });



 
 
     
 
  