<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\ProductRequest;
use Modules\Admin\Models\User;
use Modules\Admin\Models\Category;
use Modules\Admin\Models\Product;
use Modules\Admin\Models\Transaction;
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
use App\iyzipay\configIyzipay;
/**
 * Class AdminController
 */
class TransactionController extends Controller {
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
    }

    protected $categories;

    /*
     * Dashboard
     * */

    public function index(Transaction $transaction, Request $request) 
    { 
        
       $page_title = 'Transaction';
        $page_action = 'View Transaction'; 
        if ($request->ajax()) {
            $id = $request->get('id'); 
            $category = Transaction::find($id); 
            $category->status = $s;
            $category->save();
            echo $s;
            exit();
        }
        
        $vendor_id = $request->session()->get('current_vendor_id');
        
        if($request->session()->get('current_vendor_type') != 1){
            $transaction = $transaction->with('user','product','coupan')->select('transactions.*')->join('products', 'transactions.product_id', '=', 'products.id')->where('products.created_by',$vendor_id)->orderBy('transactions.id','desc')->Paginate($this->record_per_page);
        }else{
            $transaction = $transaction->with('user','product','coupan')->orderBy('id','desc')->Paginate($this->record_per_page);
        }
        //echo "<pre>"; print_r($transaction); die;
        return view('packages::transaction.index', compact('transaction', 'page_title', 'page_action','helper'));
   
    }

    /*
     * create  method
     * */

    public function create(Transaction $product) 
    {
        $page_title = 'Transaction';
        $page_action = 'Create Transaction';
        $sub_category_name  = Product::all();
        $category   = Category::all();
        $cat = [];
        foreach ($category as $key => $value) {
             $cat[$value->category_name][$value->id] =  $value->sub_category_name;
        } 

         $categories =  Category::attr(['name' => 'product_category','class'=>'form-control form-cascade-control input-small'])
                        ->selected([1])
                        ->renderAsDropdown(); 
        return view('packages::product.create', compact('categories','cat','category','product','sub_category_name', 'page_title', 'page_action'));
     }

    /*
     * Save Group method
     * */

    public function store(ProductRequest $request, Transaction $product) 
    {
         
       
        return Redirect::to(route('transaction'))
                            ->with('flash_alert_notice', 'New Transaction was successfully created !');
    }
    /*
     * Edit Group method
     * @param 
     * object : $category
     * */

    public function edit(Transaction $transaction) {

        $page_title = 'Transaction';
        $page_action = 'Show Transaction'; 
        

        return view('packages::product.edit', compact( 'categories','product', 'page_title', 'page_action'));
    }

    public function update(ProductRequest $request, Transaction $transaction) 
    {
           
         
        return Redirect::to(route('transaction'))
                        ->with('flash_alert_notice', 'Transaction was  successfully updated !');
    }
    /*
     *Delete User
     * @param ID
     * 
     */
    public function destroy(Transaction $Transaction) {
        
        Transaction::where('id',$product->id)->delete();

        return Redirect::to(route('transaction'))
                        ->with('flash_alert_notice', 'Transaction was successfully deleted!');
    }

    public function show(Product $product) {
        
    }
    
    public function approve(Transaction $transaction,$id) {
        
        $transaction = $transaction->where('id',$id)->first();
        
        $options = configIyzipay::options();
        
        $request = new \Iyzipay\Request\CreateApprovalRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId('Item'.uniqid().time());
        $request->setPaymentTransactionId($transaction->ItemTransactionId);
        
        $approval = \Iyzipay\Model\Approval::create($request, $options);
        //echo "<pre>";  print_r($approval->getStatus()); die;
        if($approval->getStatus() != 'failure'){
            $transaction->status = 3;
            $transaction->save();
            return Redirect::to(route('transaction'))
                            ->with('flash_alert_notice', 'Order Approved successfully !');
        }else{
            return Redirect::to(route('transaction'))
                            ->with('flash_alert_warning', 'Order Not Approved !');
        }
        
        
    }
    
    public function decline(Transaction $transaction,$id) {
        $transaction = $transaction->where('id',$id)->first();
        
        $options = configIyzipay::options();
        
        $request = new \Iyzipay\Request\CreateApprovalRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId('Item'.uniqid().time());
        $request->setPaymentTransactionId($transaction->ItemTransactionId);
                
        $disapproval = \Iyzipay\Model\Disapproval::create($request, $options);
        echo "<pre>"; print_r($disapproval);
        
    }

}
