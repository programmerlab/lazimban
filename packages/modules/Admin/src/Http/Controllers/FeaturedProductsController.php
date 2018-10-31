<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\FeaturedProductRequest;
use Modules\Admin\Models\User;
use Modules\Admin\Models\FeaturedProduct;
use Modules\Admin\Models\Product;
use Modules\Admin\Models\Category;
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
use Cart;
use App\iyzipay\configIyzipay;
use App\iyzipay\configIyzipay1;
/**
 * Class AdminController
 */
class FeaturedProductsController extends Controller {
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
        View::share('viewPage', 'featuredProduct');
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

    public function index(FeaturedProduct $featuredProduct, Request $request) 
    { 
       $page_title = 'Featured Products';
        $page_action = 'View Featured Products'; 
        if ($request->ajax()) {
            $id = $request->get('id'); 
            $category = FeaturedProduct::find($id); 
            $category->status = $s;
            $category->save();
            echo $s;
            exit();
        }
         
        $vendor_id = $request->session()->get('current_vendor_id');
        
        if($request->session()->get('current_vendor_type') != 1){
         $featuredProducts = DB::table('featuredProducts as fp')
                    ->leftjoin('products as p', 'fp.product_id','=','p.id')
                    ->select('p.product_title','p.photo','fp.created_at','fp.id','fp.user_id','fp.validity','fp.status')
                    ->where('p.created_by',$vendor_id)
                    ->orderBy('fp.id','desc')
                    ->get();
                                        
                    return view('packages::featuredProduct.index', compact('featuredProducts', 'page_title', 'page_action','helper'));
        }else{
            $featuredProducts = DB::table('featuredProducts as fp')
                    ->leftjoin('products as p', 'fp.product_id','=','p.id')
                    ->select('fp.product_id','p.product_title','p.photo','fp.created_at','fp.id','fp.user_id','fp.validity','fp.status')                    
                    ->orderBy('fp.id','desc')
                    ->get();
                    return view('packages::featuredProduct.index_1', compact('featuredProducts', 'page_title', 'page_action','helper'));
        }
        //echo "<pre>"; print_r($featuredProducts); die;

        
   
    }

    /*
     * create  method
     * */

    public function create(FeaturedProduct $featuredProduct, Request $request) 
    {        
        $page_title = 'Featured Products';
        $page_action = 'Add Featured Product';
         $sub_category_name  = Product::all();
        $category   = Category::all();
        $cat = [];
        foreach ($category as $key => $value) {
             $cat[$value->category_name][$value->id] =  $value->sub_category_name;
        } 

         $categories =  Category::attr(['name' => 'product_category', 'class'=>'form-control form-cascade-control input-small', 'onClick'=>'get_products(this.value)'])
                        ->selected([1])
                        ->renderAsDropdown();
                        
        if($request->session()->get('current_vendor_type') != 1){                
            return view('packages::featuredProduct.create', compact('categories','cat','category','featuredProduct','sub_category_name', 'page_title', 'page_action'));
        }else{
            return view('packages::featuredProduct.create_1', compact('categories','cat','category','featuredProduct','sub_category_name', 'page_title', 'page_action'));
        }
     }

    /*
     * Save Group method
     * */


   

    public function store(FeaturedProductRequest $request, FeaturedProduct $featuredProduct) 
    {                       
        $vendor_id = $request->session()->get('current_vendor_id');
        //echo "<pre>"; print_r($featuredProduct); die;
        //echo $request->get('product'); die;
        if(!$request->get('product')){
           // echo "nnn"; die;
            return Redirect::to(route('featuredProduct.create'))
                            ->with('flash_alert_notice', 'Please select product  !');
        }
        if ($request->get('product')) {             
            //echo "<pre>"; print_r($featuredProduct); die;
            if($request->session()->get('current_vendor_type') != 1){
                $validity = strtotime(date('d M Y', strtotime("+".$request->get('validity')." day", strtotime(date('d M Y')))));
                                
                DB::table('featuredProducts')->insert(
                        ['product_id' => $request->get('product'),
                         'validity' => $validity,
                         'amount' => $request->get('amount'),
                         'user_id' => $vendor_id
                         ]
                    );
                $id = DB::getPdo()->lastInsertId();;
                $request->session()->put('featured_amount',$request->get('amount'));
                $request->session()->put('featured_product_id',$id);
                return Redirect::to('satici-paneli/featuredProducts/card');
            }else{
                DB::table('featuredProducts')->insert(
                    ['product_id' => $request->get('product'),
                     'status' => 1,
                     'validity' => 9940010400
                     ]
                ); 
            }
            //$featuredProduct->save(); 

        }
       
        return Redirect::to(route('featuredProduct'))
                            ->with('flash_alert_notice', 'Product was successfully added to featured products list !');
    }
    /*
     * Edit Group method
     * @param 
     * object : $category
     * */

    
    /*
     *Delete User
     * @param ID
     * 
     */
    public function destroy(FeaturedProduct $featuredProduct) {
        
        FeaturedProduct::where('id',$featuredProduct->id)->delete();

        return Redirect::to(route('featuredProduct'))
                        ->with('flash_alert_notice', 'Product was successfully removed from featured products list!');
    }

    public function show(FeaturedProduct $featuredProduct) {
        
    }
    
    public function get_products(FeaturedProductRequest $request,Product $product) {
        $catid = $request->get('cat_id');
        if($request->session()->get('current_vendor_type') != 1){     
            $products = DB::table('products')
                        ->where('product_category', $catid)
                        ->where('created_by',$request->session()->get('current_vendor_id'))
                        ->get();
        }else{
            $products = DB::table('products')
                        ->where('product_category', $catid)
                        ->get();
        }
        //print_r($products); die;
        return view('packages::featuredProduct.getProducts', compact('products'));
    }
    
    public function get_validity(FeaturedProductRequest $request,Product $product) {
        $catid = $request->get('cat_id');
        $validity = $request->get('validity');
        $categories = DB::table('categories')
                        ->where('id', $catid)
                        ->get();
        //print_r($categories[0]->weekly_featured); die;
        if($validity == 7){            
            echo $categories[0]->weekly_featured;
        }else{
            echo $categories[0]->monthly_featured;
        }            
    }
    
    
    public function card(Request $requests)
    {
        $page_title = 'Pay for Featured Products';
        $page_action = 'pay Featured Product';
            $options = configIyzipay1::options();
            
            $helper =  new   Helper;
            $commission = 0;
                                
            $vendor_id = $requests->session()->get('current_vendor_id');
            $conversation_id = uniqid().rand(100,999);
            $price = $requests->session()->get('featured_amount');
           
            //echo "<pre>"; print_r($cart); die;
                $request = new \Iyzipay\Request\CreateCheckoutFormInitializeRequest();
                $request->setLocale(\Iyzipay\Model\Locale::TR);
                $request->setConversationId($conversation_id);
                //$request->setPrice(((100-$commission)/100)*$total);
                $request->setPaidPrice($price);
                $request->setCurrency(\Iyzipay\Model\Currency::TL);
                $request->setBasketId("B67832");
                $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
                $request->setCallbackUrl(url('/satici-paneli/featuredProducts/card_callback'));
                $request->setEnabledInstallments(array(1));
                
                $buyer = new \Iyzipay\Model\Buyer();
                $buyer->setId($vendor_id);
                $buyer->setName('test');
                $buyer->setSurname('test');
                //$buyer->setGsmNumber("+905350000000");
                $buyer->setEmail('test@gmail.com');
                $buyer->setIdentityNumber("USER_".$vendor_id);
                //$buyer->setLastLoginDate("2015-10-05 12:43:35");
                //$buyer->setRegistrationDate("2013-04-21 15:12:09");
                $buyer->setRegistrationAddress("Not Available");
                $buyer->setIp("85.34.78.112");
                $buyer->setCity("N/A");
                $buyer->setCountry("Turkey");
                $buyer->setZipCode("N/A");
                
                $request->setBuyer($buyer);
                $shippingAddress = new \Iyzipay\Model\Address();
                $shippingAddress->setContactName('test');
                $shippingAddress->setCity('N/A');
                $shippingAddress->setCountry('N/A');
                $shippingAddress->setAddress('N/A');
                $shippingAddress->setZipCode('N/A');
                $request->setShippingAddress($shippingAddress);
                
                
                $billingAddress = new \Iyzipay\Model\Address();
                $billingAddress->setContactName('test');
                $billingAddress->setCity('N/A');
                $billingAddress->setCountry('N/A');
                $billingAddress->setAddress('N/A');                
                $billingAddress->setZipCode('N/A');
                $request->setBillingAddress($billingAddress);
                
                $basketItems = array();
                
                
                    $BasketItem = new \Iyzipay\Model\BasketItem();
                    $BasketItem->setId($vendor_id);
                    $BasketItem->setName('test');
                    $BasketItem->setCategory1("Main");                    
                    $BasketItem->setItemType(\Iyzipay\Model\BasketItemType::VIRTUAL);
                                     
                    $BasketItem->setPrice(((100-$commission)/100)*($price));
                    
                    $basketItems[0] = $BasketItem;
                    
                
                $request->setBasketItems($basketItems);
                
                $request->setPrice($price);                            
                
                //echo "<pre>"; print_r($request); die;
        //echo "<pre>"; print_r($options); die;        
        $checkoutFormInitialize = \Iyzipay\Model\CheckoutFormInitialize::create($request, $options);
        
        //return Redirect::to('order')->with( ['iyzipay' => $request] );
        //echo "<pre>"; print_r($checkoutFormInitialize); die; 
        print_r($checkoutFormInitialize->getCheckoutFormContent());
        return view('packages::featuredProduct.payment',compact('page_title', 'page_action'));   
        ?>
            <!--<div id="iyzipay-checkout-form" class="responsive"></div>-->
        <?php        
    }
    
    public function card_callback(Request $requests){
        $options = configIyzipay::options();
        
        $request = new \Iyzipay\Request\RetrieveCheckoutFormRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setToken($_REQUEST['token']);
        
        $checkoutForm = \Iyzipay\Model\CheckoutForm::retrieve($request, $options);
        
        
            
        //echo "<pre>"; print_r($checkoutForm); die;
        if($checkoutForm->getPaymentStatus() == 'SUCCESS'){
            
            $fp_id = $requests->session()->get('featured_product_id');
            DB::table('featuredProducts')
            ->where('id', $fp_id)
            ->update(['status' => 1]);
            
            return  Redirect::to('satici-paneli/featuredProduct');            
        }else{
            return  Redirect::to('satici-paneli/featuredProduct');
        }
        die;
        
    }

}
