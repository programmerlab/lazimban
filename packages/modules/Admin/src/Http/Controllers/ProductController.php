<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\ProductRequest;
use Modules\Admin\Models\User;
use Modules\Admin\Models\Vendor;
use Modules\Admin\Models\Category;
use Modules\Admin\Models\Brand;
use Modules\Admin\Models\Size;
use Modules\Admin\Models\Product;
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
use Cart; 
/**
 * Class AdminController
 */
class ProductController extends Controller {
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
        View::share('viewPage', 'product');
        View::share('helper',new Helper);
        $this->record_per_page = Config::get('app.record_per_page');
        View::share('total_item',Cart::content()->count());
        View::share('sub_total',Cart::subtotal());
        
        $color = ['Black','Blue','Green','Orange','Purple','Red'];
        $size  = ['XS','S','M','L'];
        
        View::share('cart',Cart::content());
        $pid = [];
        foreach (Cart::content() as $key => $value) {
            $pid[] = $value->id;
        }
        $product_photo =   DB::table('products')->select('photo','id')->whereIn('id',$pid)->get();//DB::table('products')->whereIn('id',$pid)->get(['photo','id'])->toArray();
        //print_r(Cart::content()); die;
        View::share('product_photo',$product_photo);
    }

    protected $categories;

    /*
     * Dashboard
     * */

    public function redirect( Request $request){
        $page_title = 'Redirect 301';
        $page_action = 'View Redirect';  
 
        $search = $request->get('search');

        if(!empty($search)){
                 $u = Category::with(['product' => function($q) use($search) { 
                if(!empty($search)){
                     $q->where('url','LIKE',"%$search%");
                }  
            }])->where(function($q) use($search) { 
                if(!empty($search)){
                     $q->where('slug','=',$search);
                     $q->Orwhere('old_slug','=',$search);
                }  
            })->Paginate(15); 
        }else{
             $u = Category::with('product')->orderBy('id','desc')->Paginate(15); 
        }

       

          

        if($request->method()=='POST'){ 

            if($request->get('category_id')){
                $data['slug'] =  $request->get('new_url');
                $data['old_slug'] = $request->get('old_url');

                \DB::table('categories')->where(['id'=>$request->get('category_id')])->update($data);

                return Redirect::to(url('admin/redirect-301'))
                            ->with('flash_alert_notice', 'New Url updated !');

            }

            if($request->get('product_id')){

                $data['url'] =  $request->get('new_url');
                $data['old_url'] = $request->get('old_url');

                \DB::table('products')->where(['id'=>$request->get('product_id')])->update($data);
                return Redirect::to(url('admin/redirect-301'))
                            ->with('flash_alert_notice', 'New Url updated !');
            }


        }

        return view('packages::redirect.index', compact('url1', 'page_title', 'page_action','helper','url2','u'));
    }
    
    public function redirects( Request $request){
        $page_title = 'Redirect 302';
        $page_action = 'View Redirect 302';  
 
        $search = $request->get('search');

        if(!empty($search)){
                 $u = Category::with(['product' => function($q) use($search) { 
                if(!empty($search)){
                     $q->where('url_302','LIKE',"%$search%");
                }  
            }])->where(function($q) use($search) { 
                if(!empty($search)){
                     $q->where('slug_302','=',$search);
                     $q->Orwhere('oldslug_302','=',$search);
                }  
            })->Paginate(15); 
        }else{
             $u = Category::with('product')->orderBy('id','desc')->Paginate(15); 
        }

       

          

        if($request->method()=='POST'){ 

            if($request->get('category_id')){
                $data['slug_302'] =  $request->get('new_url');
                $data['oldslug_302'] = $request->get('old_url');

                \DB::table('categories')->where(['id'=>$request->get('category_id')])->update($data);

                return Redirect::to(url('admin/redirect-302'))
                            ->with('flash_alert_notice', 'New Url updated !');

            }

            if($request->get('product_id')){

                $data['url_302'] =  $request->get('new_url');
                $data['oldurl_302'] = $request->get('old_url');

                \DB::table('products')->where(['id'=>$request->get('product_id')])->update($data);
                return Redirect::to(url('admin/redirect-302'))
                            ->with('flash_alert_notice', 'New Url updated !');
            }


        }
        
        return view('packages::redirects.index', compact('url1', 'page_title', 'page_action','helper','url2','u'));
    }
    
    public function index(Product $product, Request $request) 
    { 
        
       $page_title = 'Product';
        $page_action = 'View Product'; 
        if ($request->ajax()) {
            $id = $request->get('id');
            $status = $request->get('status');
            $category = $product->where('id',$id)->first();//Product::find($id);
            //print_r($category); die;
            $s = ($status == 1) ? $status = 0 : $status = 1;
            $category->status = $s;
            $category->save();
            echo $s;
            exit();
        }
         
        $vendor_id = $request->session()->get('current_vendor_id');
        $vendorlist = DB::table('admin')->select('id','company_name','full_name')->where('user_type',2)->orderBy('id','desc')->get();
        //echo "<pre>"; print_r($vendorlist);die;
        if($_POST){
            //print_r($_POST);die;
                if($_POST['vendor'] != ''){
                    $products = $product->with('category')->where('created_by',$_POST['vendor'])->orderBy('id','desc')->Paginate($this->record_per_page);
                }else{
                    $products = $product->with('category')->select('products.*', 'admin.company_name')->join('admin','products.created_by','=','admin.id')->orderBy('products.id','desc')->Paginate($this->record_per_page);
                }
                
        }else{
                if($request->session()->get('current_vendor_type') != 1){
                    $products = $product->with('category')->where('created_by',$vendor_id)->orderBy('id','desc')->Paginate($this->record_per_page);
                }else{
                    $products = $product->with('category')->select('products.*', 'admin.company_name')->join('admin','products.created_by','=','admin.id')->orderBy('products.id','desc')->Paginate($this->record_per_page);
                }    
        }
        
        
        
        //echo "<pre>"; print_r($products); die;
        if($request->session()->get('current_vendor_type') == 1){
            return view('packages::product.index_1', compact('products', 'page_title', 'page_action','helper','vendorlist'));
        }else{
            return view('packages::product.index', compact('products', 'page_title', 'page_action','helper','vendorlist'));
        }
        
   
    }

    /*
     * create  method
     * */

    public function create(Product $product, Request $request) 
    {  
        $page_title = 'Product';
        $page_action = 'Create Product';
        $sub_category_name  = Product::all();
        $category   = Category::all();
        $brand   = Brand::all();
        $size   = Size::all();
        
        $cat = [];
        foreach ($category as $key => $value) {
             $cat[$value->category_name][$value->id] =  $value->sub_category_name;
        } 

         $categories =  Category::attr(['name' => 'product_category','class'=>'form-control form-cascade-control input-small'])
                        ->selected([1])
                        ->renderAsDropdown();
                     
        if($request->session()->get('current_vendor_type') == 1){
            return view('packages::product.create_1', compact('categories','cat','category','brand','size','product','sub_category_name', 'page_title', 'page_action'));
        }else{
            return view('packages::product.create', compact('categories','cat','category','brand','size','product','sub_category_name', 'page_title', 'page_action'));
        }
        
     }

    /*
     * Save Group method
     * */


    public function getCategoryUrl($id){
        $parent_id = $id; 
        $arr = [];
        $slash = "/" ;
            while (1) {
                $data = Category::where('id',$parent_id)->first();
               
                if($data)
                {
                   // $level++;
                    $parent_id = $data->parent_id;

                    $arr[] = $data->slug;
                }else{
                    break;
                }
            } 
            $url = implode('/', array_reverse($arr)).$slash;
       
        return  $url;
    }

     public function getCategoryById($id){
        $url =  Category::with('parent')->where('id',$id)->first();
        
        return  $url->slug.'/';
    }

    public function store(ProductRequest $request, Product $product) 
    {             
        $cat_url    = $this->getCategoryById($request->get('product_category')); 
        $vendor_id = $request->session()->get('current_vendor_id');
        //echo "<pre>"; print_r($vendor_id); die;
        
        if ($request->file('image')) { 
            $photo = $request->file('image');
            $destinationPath = storage_path('uploads/products');
            
            if($request->get('img_name')){
                $ext = pathinfo($photo->getClientOriginalName(), PATHINFO_EXTENSION);
                $photo->move($destinationPath, $request->get('img_name'));
                $photo_name = $request->get('img_name').'.'.$ext;
            }else{
                $photo->move($destinationPath, time().$photo->getClientOriginalName());
                $photo_name = time().$photo->getClientOriginalName();
            }
            
            
            $request->merge(['photo'=>$photo_name]);
           
            $product->product_title      =   $request->get('product_title');
            if($request->get('slug') && !empty($request->get('slug'))){
                $product->slug              =   strtolower(str_replace(" ", "-", $request->get('slug')));  
                $pro_slug   = strtolower(str_replace(" ", "-", $request->get('slug')));
                $url        = $cat_url.$pro_slug;  
            }else{
                $product->slug              =   strtolower(str_replace(" ", "-", $request->get('product_title')));
                $pro_slug   = strtolower(str_replace(" ", "-", $request->get('product_title')));
                $url        = $cat_url.$pro_slug;
            }
            
            
            
            if($request->file('additional_image')[0]){
                $images = $request->file('additional_image');
                
                foreach($images as $imgs){
                    $destinationPath = storage_path('uploads/products');                    
                    $imgs->move($destinationPath, time().$imgs->getClientOriginalName());
                    $additionalphotoname[] = time().$imgs->getClientOriginalName();                    
                }
                
                if(isset($additionalphotoname) && $additionalphotoname != ''){
                //$request->merge(['additional_image'=>json_encode($additionalphotoname)]);
                }
                //echo "<pre>"; print_r($photoname); die;
            }
            
            $option['size'] = $request->get('size');
            $option['color'] = $request->get('color');
            $options = json_encode($option);
            //echo $options; die;
            $product->product_category   =   $request->get('product_category');
            $product->short_description        =   $request->get('short_description');
            $product->description        =   $request->get('description');
            $product->brand              =   $request->get('brand');
            $product->shipping_charge    =   $request->get('shipping_charge');
            $product->price              =   $request->get('price');
            $product->discount           =   $request->get('discount');
            $product->qty                =   $request->get('qty');
            $product->photo              =   $photo_name;
            $product->img_name           =   $request->get('img_name');
            $product->img_alt           =   $request->get('img_alt');
            $product->is_indexing           =   $request->get('is_indexing');
            if(isset($additionalphotoname) && $additionalphotoname != ''){
                $product->additional_images  =   isset($additionalphotoname) ? json_encode($additionalphotoname) : '';
            }
            $product->options            =   $options;
            $product->meta_key           =   $request->get('meta_key');
            $product->meta_description   =   $request->get('meta_description');
            $product->canonical_tag      =   $request->get('canonical_tag');
            $product->video              =   $request->get('video');
            $product->url                =   $url;
            $product->created_by                =   $vendor_id;

            if($request->get('title')){
                $product->title  = $request->get('title');
            }
 
            $product->save(); 
           
        } 
        
        if($request->session()->get('current_vendor_type') == 1){
            return Redirect::to(route('product'))
                        ->with('flash_alert_notice', 'New Product was successfully created!');
        }else{
            return Redirect::to(route('product'))
                        ->with('flash_alert_notice', 'Yeni Ürün başarıyla oluşturuldu!');
        }
       
    }
    /*
     * Edit Group method
     * @param 
     * object : $category
     * */

    public function edit(Product $product, ProductRequest $request) {
        $page_title = 'Product';
        $page_action = 'Show Product'; 
        $category   = Category::all();
        $brand   = Brand::all();
        //echo "<pre>"; print_r($product); die;
        $cat = [];
        foreach ($category as $key => $value) {
             $cat[$value->category_name][$value->id] =  $value->sub_category_name;
        } 
        
        $categories =  Category::attr(['name' => 'product_category','class'=>'form-control form-cascade-control input-small'])
                        ->selected(['id'=>$product->product_category])
                        ->renderAsDropdown();
        
        $variations = DB::table('product_variations')->select('*')->where('product_id',$product->id)->orderBy('id','asc')->get();
        //echo "<pre>"; print_r($variations); die;
        if($request->session()->get('current_vendor_type') == 1){
            return view('packages::product.edit_1', compact( 'categories','brand','product', 'page_title', 'page_action','variations'));
        }else{
            return view('packages::product.edit', compact( 'categories','brand','product', 'page_title', 'page_action','variations'));
        }
        
    }

    public function update(ProductRequest $request, Product $product) 
    {        
        $cat_url       = $this->getCategoryById($request->get('product_category'));
        
        
        if(($request->file('additional_image')[0])){
                $images = $request->file('additional_image');
                
                foreach($images as $imgs){
                    $destinationPath = storage_path('uploads/products');                    
                    $imgs->move($destinationPath, time().$imgs->getClientOriginalName());
                    $additionalphotoname[] = time().$imgs->getClientOriginalName();                    
                }
                
                $request->merge(['additional_image'=>json_encode($additionalphotoname)]);                
                $additional_image = json_encode($additionalphotoname);
            }else{
               $additional_image = $product->additional_images; 
            }
            
       
         if ($request->file('image')) { 

            $photo = $request->file('image');
            //$destinationPath = base_path() . '/public/uploads/products/';
            $destinationPath = storage_path('uploads/products');
            
            if($request->get('img_name')){
                $ext = pathinfo($photo->getClientOriginalName(), PATHINFO_EXTENSION);
                $photo->move($destinationPath, $request->get('img_name').'.'.$ext);
                $photo_name = $request->get('img_name').'.'.$ext;
            }else{
                $photo->move($destinationPath, time().$photo->getClientOriginalName());
                $photo_name = time().$photo->getClientOriginalName();
            }
            
            $request->merge(['photo'=>$photo_name]);
           
            $product->product_title      =   $request->get('product_title');
            if($request->get('slug') && !empty($request->get('slug'))){
                $product->slug              =   strtolower(str_replace(" ", "-", $request->get('slug')));  
                $pro_slug   = strtolower(str_replace(" ", "-", $request->get('slug')));
                $url        = $cat_url.$pro_slug;  
            }else{
                $product->slug              =   strtolower(str_replace(" ", "-", $request->get('product_title')));
                $pro_slug   = strtolower(str_replace(" ", "-", $request->get('product_title')));
                $url        = $cat_url.$pro_slug;
            }
            
            $option['size'] = $request->get('size');
            $option['color'] = $request->get('color');
            $option['quantity'] = $request->get('quantity');
            $options = json_encode($option);
            
            $product->product_category   =   $request->get('product_category');
            $product->description        =   $request->get('description');
            $product->short_description        =   $request->get('short_description');
            $product->brand              =   $request->get('brand');
            $product->shipping_charge    =   $request->get('shipping_charge');
            $product->qty                =   $request->get('qty');
            $product->photo              =   $photo_name;
            $product->img_name           =   $request->get('img_name');
            $product->img_alt           =    $request->get('img_alt');
            $product->additional_images  =   $additional_image;
            $product->options            =   $options;
            $product->price              =   $request->get('price');
            $product->discount           =   $request->get('discount');
            $product->meta_key           =   $request->get('meta_key');
            $product->meta_description   =   $request->get('meta_description');
            $product->canonical_tag      =   $request->get('canonical_tag');
            $product->url               =   $url;
            $product->video              =   $request->get('video');
            $product->is_indexing           =   $request->get('is_indexing');            
            if($request->get('title')){
                $product->title  = $request->get('title');
            }
            
            $product->save();
            DB::table('product_variations')->where('product_id',$product->id)->delete();
            foreach($option['size'] as $key=>$value){
                  $pdata[] = array('product_id'=>$product->id,'size'=>$option['size'][$key], 'color'=>$option['color'][$key] , 'quantity'=>$option['quantity'][$key]);      
            }
            DB::table('product_variations')->insert($pdata); 
        }else{
            
            $product->product_title      =   $request->get('product_title');
            if($request->get('slug') && !empty($request->get('slug'))){
                $product->slug              =   strtolower(str_replace(" ", "-", $request->get('slug')));  
                $pro_slug   = strtolower(str_replace(" ", "-", $request->get('slug')));
                $url        = $cat_url.$pro_slug;  
            }else{
                $product->slug              =   strtolower(str_replace(" ", "-", $request->get('product_title')));
                $pro_slug   = strtolower(str_replace(" ", "-", $request->get('product_title')));
                $url        = $cat_url.$pro_slug;
            }
            
            
            $option['size'] = $request->get('size');
            $option['color'] = $request->get('color');
            $option['quantity'] = $request->get('quantity');
            $options = json_encode($option);
            //echo $options; die;
            $product->product_category   =   $request->get('product_category');
            $product->description        =   $request->get('description');
            $product->short_description        =   $request->get('short_description');
            $product->brand              =   $request->get('brand');
            $product->shipping_charge    =   $request->get('shipping_charge');
            $product->qty                =   $request->get('qty');
            $product->photo              =   $request->get('photo');
            $product->img_name           =   $request->get('img_name');
            $product->img_alt           =    $request->get('img_alt');
            $product->additional_images  =   $additional_image;
            $product->options            =   $options;
            $product->price              =   $request->get('price');
            $product->discount           =   $request->get('discount');
            $product->meta_key           =   $request->get('meta_key');
            $product->meta_description   =   $request->get('meta_description');
            $product->canonical_tag      =   $request->get('canonical_tag');
            $product->url                =   $url;
            $product->video              =   $request->get('video');
            $product->is_indexing           =   $request->get('is_indexing');            
            //echo "<pre>"; print_r($product); die;
            if($request->get('title')){
                $product->title  = $request->get('title');
            }
                        
            $product->save();            
            
            if($option['quantity']){
                DB::table('product_variations')->where('product_id',$product->id)->delete();
                foreach($option['size'] as $key=>$value){
                      $pdata[] = array('product_id'=>$product->id,'size'=>$option['size'][$key], 'color'=>$option['color'][$key] , 'quantity'=>$option['quantity'][$key]);      
                }
                DB::table('product_variations')->insert($pdata);    
            }            
        }
        
        if($request->session()->get('current_vendor_type') == 1){
            return Redirect::to(route('product'))
                        ->with('flash_alert_notice', 'Product was  successfully updated !');
        }else{
            return Redirect::to(route('product'))
                        ->with('flash_alert_notice', 'Ürün başarıyla güncellendi!');
        }
    }
    /*
     *Delete User
     * @param ID
     * 
     */
    public function destroy(Product $product,Request $request) {
        
        Product::where('id',$product->id)->delete();
        DB::table('featuredProducts')->where('product_id',$product->id)->delete();
        if($request->session()->get('current_vendor_type') == 1){
            return Redirect::to(route('product'))
                        ->with('flash_alert_notice', 'Product was successfully deleted!');
        }else{
            return Redirect::to(route('product'))
                        ->with('flash_alert_notice', 'Ürün başarıyla silindi!');
        }
    }

    public function show(Product $product) {
        
    }

}
