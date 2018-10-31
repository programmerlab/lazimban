<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth; 
use Modules\Admin\Models\User;
use Modules\Admin\Models\Category;
use Modules\Admin\Models\Brand;
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

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     

      public function __construct(Request $request,Settings $setting) {
        View::share('helper',new Helper);
        View::share('category_name',$request->segment(1));
        View::share('total_item',Cart::content()->count());
        View::share('sub_total',Cart::subtotal()); 
        View::share('userData',$request->session()->get('current_user'));
        View::share('cart',Cart::content());
        
   
        //echo "<pre>"; print_r($pages); die;
        
        $hot_products   = Product::orderBy('views','desc')->where('status',1)->limit(3)->get();        
        $special_deals  = Product::orderBy('discount','desc')->limit(3)->get(); 
        View::share('hot_products',$hot_products);
        View::share('special_deals',$special_deals);
        
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
         View::share('banner',$banner);  

        $base_page =  Route::currentRouteName();

        $path_info = explode('/', $request->getpathInfo());
        $md = ($setting::where('field_key','meta_description')->first());
        $mk = ($setting::where('field_key','meta_key')->first());
       

        if($base_page == 'homePage'){
            $meta_description =  isset($md->field_value)?$md->field_value:'';
            $meta_key         =  isset($mk->field_value)?$mk->field_value:'';
        }
        elseif($base_page == 'productName'){
            $data             = Product::where('slug',$path_info[2])->first();
            $meta_description = isset($data->meta_description)?$data->meta_description:'';
            $meta_key         = isset($data->meta_key)?$data->meta_key:'';
        }
        elseif($base_page == 'productcategory'){ 
         
            $data = Category::where('slug',$path_info[1])->first();

            $meta_description = isset($data->meta_description)?$data->meta_description:'';
            $meta_key         = isset($data->meta_key)?$data->meta_key:'';

        }else{
            $meta_description =  isset($md->field_value)?$md->field_value:'';
            $meta_key         =  isset($mk->field_value)?$mk->field_value:'';
        }
 
        View::share('meta_description',$meta_description);
        View::share('meta_key',$meta_key);
        View::share('getpathInfo',$request->getpathInfo());
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $categories = Category::nested()->get();

        return view('home'); 


        $html =  Category::renderAsHtml(); 

        $categories =  Category::attr(['name' => 'categories'])
                        ->selected([3])
                        ->renderAsDropdown();
          return view('category',compact('categories','html')); 

    } 

    public function category(Request $request)
    {

        $btn = $request->get('submit_btn');

        if($btn=="Add Category")
        {
            $name = $request->get('sub_cat');
            $slug = str_slug($request->get('sub_cat'));
            $parent_id = 0;
            $cat = new Category;
            $cat->name = title_case($request->get('sub_cat'));
            $cat->slug = strtolower(str_slug($request->get('sub_cat')));
            $cat->parent_id = $request->get('categories');
            $cat->save();            
        }
        if($btn=="Add Sub Category")
        {
            $name = $request->get('sub_cat');
            $slug = str_slug($request->get('sub_cat'));
            $parent_id = $request->get('categories');

            $cat = new Category;

            $cat->name = title_case($request->get('sub_cat'));
            $cat->slug = strtolower(str_slug($request->get('sub_cat')));
            $cat->parent_id = $request->get('categories');

            $cat->save();
        }
        $categories =  Category::attr(['name' => 'categories'])
                        ->selected([3])
                        ->renderAsDropdown();

       $html =  Category::renderAsHtml(); 

       return view('category',compact('categories','html'));

  
    }


    public function home()
    {
        $banner_path1   = asset('public/enduser/assets/images/sliders/01.jpg');
        $banner_path2   = asset('public/enduser/assets/images/sliders/02.jpg');
 
        return view('end-user.home', compact('banner_path1', 'banner_path2'));
    }
 /*----------*/
    public function checkout()
    {
         
         $request = new Request;

        
        $products = Product::with('category')->orderBy('id','asc')->get();
        $categories = Category::nested()->get(); 
        return view('end-user.checkout',compact('categories','products','category'));   
    }

     /*----------*/
    public function mainCategory( $category=null)
    {   
        $request = new Request;
        $q = Input::get('q'); 
         
        $catID = Category::where('slug',$category)->orWhere('name',$category)->first();
        
        if($catID!=null && $catID->count()){ 

            $sub_cat = Category::where('parent_id', $catID->id)->Orwhere('id', $catID->id)->lists('id');
            $co_sub_cat = [];
            foreach($sub_cat as $c){
                 $co_sub_cat[] = Category::where('parent_id', $c)->get();    
            }
            $resltt = [];
            foreach($co_sub_cat as $cs){
                  if(!empty($cs))
                  {
                        foreach($cs as $css){
                              $resltt[] =  $css->id;      
                        }                     
                  }                  
            }
            
           
            
            $products = Product::with('category')->where('status',1)->whereIn('product_category',$sub_cat)->orwhereIn('product_category',$resltt)->orderBy('id','asc')->get();
             
            if($products->count())
            { 
                 
                $products = Product::with('category')->where('status',1)->whereIn('product_category',$sub_cat)->orwhereIn('product_category',$resltt) 
                                ->orderBy('id','asc')
                                ->get();
                 if($q)
                 {
                    $products = Product::with('category')->where('status',1)->whereIn('product_category',$sub_cat)->orwhereIn('product_category',$resltt)
                                ->where('product_title','LIKE','%'.$q.'%')
                                ->orderBy('id','asc')
                                ->get(); 
                 }  
            } 
        }else{
            $products = Product::with('category')->where('status',1)->where('product_category',0)->orderBy('id','asc')->get();

        } 
        $category = isset($catID->name)?$catID->name:null;
        $category_slug = isset($catID->slug)?$catID->slug:null; 
        $categories = Category::nested()->get();
        $brand   = Brand::all();
        return view('end-user.category',compact('categories','products','category','brand','q','category','catID','helper','category_slug'));   
    }
      
      
    public function filter_content( $category=null)
    {   
        $request = new Request;
        $q = Input::get('q'); 
        
        
        $category = Input::get('category');
        $brand = Input::get('brand');
        $min_price = explode('₺',explode('-',Input::get('price'))[0])[1];
        $max_price = explode('₺',explode('-',Input::get('price'))[1])[1];
        $size = Input::get('size');
        $color = Input::get('color');
         
        $catID = Category::where('slug',$category)->orWhere('name',$category)->first();
        
        if($catID!=null && $catID->count()){ 

            $sub_cat = Category::where('parent_id', $catID->id)->Orwhere('id', $catID->id)->lists('id');
            
            $co_sub_cat = [];
            foreach($sub_cat as $c){
                 $co_sub_cat[] = Category::where('parent_id', $c)->get();    
            }
            
            $resltt = [];
            foreach($co_sub_cat as $cs){
                  if(!empty($cs))
                  {
                        foreach($cs as $css){
                              $resltt[] =  $css->id;      
                        }                     
                  }                  
            }
            
            
                  $query = Product::with('category')->where('status',1)
                                    ->whereIn('product_category',$sub_cat)
                                    ->orwhereIn('product_category',$resltt);
                  
                  if(!empty($brand)){
                            $query->whereIn('brand',$brand)->where('brand','!=',Null);        
                  }
                  
                  if($min_price != '' || $max_price != ''){
                            $query->where('price','>=',$min_price)->where('price','<=',$max_price);        
                  }
                  
                                             
                  if(!empty($color)){
                            //$query->whereExists(function ($query) {
                            //              $query->select('v.color')                                                
                            //                    ->from('products as p')
                            //                    ->join('product_variations as v','p.id','=','v.product_id')
                            //                    ->whereIn('v.color',['Black' , 'Blue']);                                                
                            //          });    
                  }  
                  
                                                
                  $products = $query->orderBy('id','asc')->get();
                  
                  if(!empty($size)){
                        //print_r($size); die;
                        $productss = [];
                        foreach($products as $p){
                              $reslt = DB::table('product_variations')
                                    ->where('product_id', $p->id)
                                    ->whereIn('size', $size)
                                    ->get();
                              if(!empty($reslt)){
                                    $productss[] = $p;
                              }
                        }
                       $products = $productss;             
                  }
                  
                  if(!empty($color)){
                        //print_r($color); die;
                        $productss = [];
                        foreach($products as $p){
                              $reslt = DB::table('product_variations')
                                    ->where('product_id', $p->id)
                                    ->whereIn('color', $color)
                                    ->get();
                              if(!empty($reslt)){
                                    $productss[] = $p;
                              }
                        }
                       $products = $productss;             
                  }
                  
                  //echo "<pre>"; print_r($products); die;
             
            //if($products->count())
            //{ 
            //     
            //    $products = Product::with('category')->where('status',1)->whereIn('product_category',$sub_cat) 
            //                    ->orderBy('id','asc')
            //                    ->get();
            //     if($q)
            //     {
            //        $products = Product::with('category')->where('status',1)->whereIn('product_category',$sub_cat)
            //                    ->where('product_title','LIKE','%'.$q.'%')
            //                    ->orderBy('id','asc')
            //                    ->get(); 
            //     }  
            //} 
        }else{
            $query = Product::with('category')->where('status',1);
            if(!empty($brand)){
                            $query->whereIn('brand',$brand)->where('brand','!=',Null);        
                  }
                  
                  if($min_price != '' || $max_price != ''){
                            $query->where('price','>=',$min_price)->where('price','<=',$max_price);        
                  }
                  
                  if(!empty($size)){
                            $query->whereExists(function ($query) {
                                          $query->select('v.size')                                                
                                                ->from('products as p')
                                                ->join('product_variations as v','p.id','=','v.product_id')
                                                ->whereIn('v.size',['m' , 'l']);                                                
                                      });    
                  }                            
                  if(!empty($color)){
                            $query->whereExists(function ($query) {
                                          $query->select('v.color')                                                
                                                ->from('products as p')
                                                ->join('product_variations as v','p.id','=','v.product_id')
                                                ->whereIn('v.color',['Black' , 'Blue']);                                                
                                      });    
                  }
                  $products = $query->orderBy('id','asc')->get();

        } 
        $category = isset($catID->name)?$catID->name:null; 
        $categories = Category::nested()->get();  
        return view('end-user.category_filter',compact('categories','products','category','q','category','catID','helper'));   
    }  
      
     /*----------*/
    public function productCategory( $category=null)
    { 
        $request = new Request;
        $q = Input::get('q'); 
         
        $catID = Category::where('slug',$category)->orWhere('name',$category)->first();
        
        if($catID!=null && $catID->count()){ 
            $products = Product::with('category')->where('status',1)->where('product_category',$catID->id)->orderBy('id','asc')->get();
            
            if($products->count()==0)
            {
                  
                  $products = Product::with('category')->where('status',1)->whereIn('product_category',[$catID->id]) 
                                ->orderBy('id','asc')
                                ->get();
                 if($q)
                 {
                    $products = Product::with('category')->where('status',1)->whereIn('product_category',[$catID->id])
                                ->where('product_title','LIKE','%'.$q.'%')
                                ->orderBy('id','asc')
                                ->get();
           
                 } 
            } 
        }else{
            $products = Product::with('category')->where('status',1)->where('product_category',0)->orderBy('id','asc')->get();

        } 
         $category = isset($catID->name)?$catID->name:null; 
        $categories = Category::nested()->get(); 
        return view('end-user.category',compact('categories','products','category','q','category'));   
    }
    /*----------*/
    public function productDetail($subCategoryName=null,$productName=null)
    {
        
        $product = Product::with('category')->where('slug',$productName)->first();
         
        $categories = Category::nested()->get();  
         
        if($product==null)
        {
             $url =  URL::previous().'?error=InvaliAccess'; 
              return Redirect::to($url);
        }else{
          $product->views=$product->views+1;
          $product->save(); 
        } 
        $main_title=  $product->product_title;
        if($product->is_indexing == 0){
            $is_indexing = 0;
        }
        
         $variations = \DB::table('product_variations')                                
                                ->where('product_id',$product->id)
                                ->get();    
        return view('end-user.product-details',compact('categories','product','main_title','helper','is_indexing','variations'));  
    }
     /*----------*/
    public function order(Request $request)
    { 
        $cart = Cart::content();
        $products = Product::with('category')->orderBy('id','asc')->get();
        $categories = Category::nested()->get(); 
        return view('end-user.order',compact('categories','products','category','cart'));   
         
    }
     /*----------*/
    public function faq()
    {
         $products = Product::with('category')->orderBy('id','asc')->get();
        $categories = Category::nested()->get();
        $page =  \DB::table('faq')->orderBy('id','desc')->get();
        //echo "<pre>"; print_r($page); die;
        return view('end-user.faq',compact('categories','products','category','page')); 
        return view('end-user.faq');   
    }
    
    public function about_us()
    {
         $products = Product::with('category')->orderBy('id','asc')->get();
        $categories = Category::nested()->get();
        $page =  \DB::table('pages')->where('slug','about')->get();        
        return view('end-user.about',compact('categories','products','category','page'));         
    }
    
    public function privacy_policy()
    {
         $products = Product::with('category')->orderBy('id','asc')->get();
        $categories = Category::nested()->get();
        $page =  \DB::table('pages')->where('slug','privacy-policy')->get();
        
        return view('end-user.privacy_policy',compact('categories','products','category','page'));         
    }

    public function returns()
    {
         $products = Product::with('category')->orderBy('id','asc')->get();
        $categories = Category::nested()->get();
        $page =  \DB::table('pages')->where('slug','delivery-and-returns')->get();
          
        return view('end-user.returns',compact('categories','products','category','page'));         
    }
    
    public function sales_contract()
    {
         $products = Product::with('category')->orderBy('id','asc')->get();
        $categories = Category::nested()->get();
        $page =  \DB::table('pages')->where('slug','distance-sales-contract')->get();
        
        return view('end-user.sales_contract',compact('categories','products','category','page'));         
    }
    
    public function contact()
    {
         $products = Product::with('category')->orderBy('id','asc')->get();
        $categories = Category::nested()->get();
        $page =  \DB::table('pages')->where('slug','contact')->get();
        
        return view('end-user.contact',compact('categories','products','category','page')); 
        return view('end-user.contact');   
    }
    
    public function contact_us(Request $request)
    {
        $template_content['name'] = $request->get('name');
        $template_content['email'] = $request->get('email');
        $template_content['message'] = $request->get('message');
        
        $helper =  new   Helper;
        $helper->contactusEmail($template_content);
        $url = url()->previous().'#bottom';
        return Redirect::to($url)->withErrors(['successMsgcontact'=>'Teşekkürler, mümkün olan en kısa sürede sizinle iletişime geçeceğiz!']);
         
    }
    
    public function enquiry(Request $request)
    {
        $template_content['name'] = $request->get('name');
        $template_content['email'] = $request->get('email');
        $template_content['title'] = $request->get('title');
        $template_content['message'] = $request->get('message');
        
        $helper =  new   Helper;
        $helper->contactusEmail($template_content);
        $url = url()->previous().'#bottom';
        return Redirect::to($url)->withErrors(['successMsgenquiry'=>'Teşekkürler, mümkün olan en kısa sürede sizinle iletişime geçeceğiz!']);
         
    }
    
    public function page($slug=Null)
    {
         $products = Product::with('category')->orderBy('id','asc')->get();
        $categories = Category::nested()->get();
        $page =  \DB::table('pages')->where('slug',$slug)->get();
        
        
        return view('end-user.'.$page[0]->page_view_name,compact('categories','products','category','page'));         
    }
     /*----------*/
    public function trackOrder()
    {
         $products = Product::with('category')->orderBy('id','asc')->get();
        $categories = Category::nested()->get(); 
        return view('end-user.track-orders',compact('categories','products','category')); 
        return view('end-user.track-orders');   
    }
     /*----------*/
    public function tNc()
    {
         $products = Product::with('category')->orderBy('id','asc')->get();
        $categories = Category::nested()->get(); 
        return view('end-user.terms-conditions',compact('categories','products','category')); 
        return view('end-user.terms-conditions');   
    }
    // Comments
    public function submitComment(Request $request){

        $url = url()->previous().'#comments';

        if($request->method()=='POST'){
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:3',
                'email' => 'required|email',
                'comments' => 'required'
            ],[
               'name.required'=>'İsminizi girmeniz gerekmektedir.',
               'email.required'=>'Eposta adresi girmeniz gerekmektedir.',
               'comments.required'=>'Yorum alanı boş olmamalıdır.'
               ]); 

            if ($validator->fails()) {
                 return Redirect::to($url)
                        ->withErrors($validator)
                        ->withInput();
            }else{
                $input = $request->only('name','email','comments','product_id');
                $duplicate = \DB::table('comments')
                                ->where('email',$request->get('email'))
                                ->where('product_id',$request->get('product_id'))
                                ->first();
                if($duplicate){
                    $data =  \DB::table('comments')
                        ->where('email',$request->get('email'))
                        ->where('product_id',$request->get('product_id'))
                        ->update($input);
                } else{
                    $data =  \DB::table('comments')->insert($input);
                }
                
                return Redirect::to($url)->withErrors(['successMsg'=>'Yorumunuz gönderilmiştir. Teşekkür ederiz!']);
                
            }
        }
    }
    public function addReview(Request $request)
    {
        $is_buy = [];
        if(($request->session()->get('current_user'))){            
            $user_id = $request->session()->get('current_user')->id;
            $is_buy = \DB::table('transactions')
                                ->where('user_id',$user_id)
                                ->where('product_id',$request->get('product_id'))
                                ->first();    
        }
        
            
        
        if(!empty($is_buy)){            
            $input = $request->only('rating','product_id');
            $data =  \DB::table('reviews')->insert($input);
            
            $rating = \DB::table('reviews')->avg('rating');
        
            \DB::table('products')
                ->where('id',$request->get('product_id'))
                    ->update(['rating'=>$rating]);
    
            $total_review = round($rating);
            return json_encode($total_review);            
        }else{            
            $rating = \DB::table('reviews')->avg('rating');
                    
            $total_review = round($rating);
            return json_encode(-1);
        }                
    }
    
    public function check_variation(Request $request){
      $size = $request->get('size');
      $p_id = $request->get('product_id');
      
      $all = \DB::table('product_variations')
                                ->select('*')
                                ->where('size',strtolower($size))
                                ->where('product_id',$p_id)
                                ->get();                                                              
            
      foreach($all as $row){                       
            $colors[] = $row->color;
            $color_quantity[] = $row->color.';'.$row->quantity;
      }
      
      $total_color = \DB::table('product_variations')
                                ->select('*')                                
                                ->where('product_id',$p_id)
                                ->get();
      
      $all_color = [];
      foreach($total_color as $row){
            if(!in_array($row->color,$all_color)) {
                        $all_color[] = $row->color; 
            }
                       
      }
      //print_r($all_color); die;
      //$all_color = ['Black','Blue','Red'];
      $color = [];
      foreach($all_color as $row){            
           if(!in_array($row,$colors)) {
                  $color[] = $row;
           }
      }
      $array = [$color,$color_quantity];
      echo json_encode($array);
      die;
    }
    
    public function check_variation_size(Request $request){
      $color = $request->get('color');
      $p_id = $request->get('product_id');
      
      $all = \DB::table('product_variations')
                                ->select('*')
                                ->where('color',($color))
                                ->where('product_id',$p_id)
                                ->get();
      //print_r($all); die;      
      foreach($all as $row){            
            $sizes[] = $row->size;
            $size_quantity[] = $row->size.';'.$row->quantity;
      }
      //print_r($sizes); die;
      $all_size = ['xxs','xs','s','m','l','xl','xxl','xxxl'];
      $size = [];
      foreach($all_size as $row){            
           if(!in_array($row,$sizes)) {
                  $size[] = $row;
           }
      }
      
      $array = [$size,$size_quantity];
      echo json_encode($array);
      die;
    }
}
