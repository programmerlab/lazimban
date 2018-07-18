<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\VendorRequest;

use Modules\Admin\Models\Vendor;
use Modules\Admin\Models\Position;
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
use Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Dispatcher; 
use App\Helpers\Helper;
use App\iyzipay\configIyzipay;
/**
 * Class AdminController
 */
class VendorsController extends Controller {
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
        View::share('viewPage', 'vendor');
        View::share('helper',new Helper);
        $this->record_per_page = Config::get('app.record_per_page');
    }

    protected $users;

    /*
     * Dashboard
     * */

    public function index(Vendor $vendor, Request $request) 
    { 
        if ($request->ajax()) {
            $id = $request->get('id');
            $status = $request->get('status');
            $vendor = admin::find($id);
            $s = ($status == 1) ? $status = 0 : $status = 1;
            $vendor->status = $s;
            $vendor->save();
            echo $s;
            exit();
        }
        
        $page_title = 'Vendor';
        $page_action = 'View Vendor'; 
        $users = $vendor->where('id','!=','1')->orderBy('id','desc')->Paginate($this->record_per_page);
        
        return view('packages::vendors.user.index', compact('users', 'page_title', 'page_action'));
    }

    /*
     * create Group method
     * */

    public function create(Vendor $vendor) 
    {
        $page_title = 'Vendor';
        $page_action = 'Create Vendor';

        return view('packages::vendors.user.create', compact('vendor', 'page_title', 'page_action'));
    }

    /*
     * Save Group method
     * */

    public function store(VendorRequest $request, Vendor $vendor) {        
        $vendor->fill(Input::all()); 
        $vendor->password = Hash::make($request->get('password'));  
        $vendor->save(); 
       
        return Redirect::to(route('vendor'))
                            ->with('flash_alert_notice', 'New vendor was successfully created !');
        }

    /*
     * Edit Group method
     * @param 
     * object : $user
     * */

    public function edit(Vendor $vendor) {

        $page_title = 'Vendor';
        $page_action = 'Show Vendors'; 
        //echo $page_title; die;
                        
        return view('packages::vendors.user.edit', compact('vendor', 'page_title', 'page_action'));
    }

    public function update(Request $request, Vendor $vendor) {
        
        $vendor->fill(Input::all());
        if($request->get('password') != ''){
            $vendor->password = Hash::make($request->get('password'));
        }
        $vendor->save();

        // update vendor on market place
        $options = configIyzipay::options();
        //echo $vendor->vendor_key; die;
        $req = new \Iyzipay\Request\UpdateSubMerchantRequest();
        $req->setLocale(\Iyzipay\Model\Locale::TR);
        $req->setConversationId(time().uniqid());
        $req->setSubMerchantKey($vendor->vendor_key);
        $req->setIban($request->iban);
        $req->setAddress($request->address);
        $req->setContactName($request->full_name);
        $req->setContactSurname($request->full_name);
        $req->setEmail($request->email);
        $req->setGsmNumber($request->phone);
        $req->setName($request->full_name);
        $req->setIdentityNumber("ID_".$vendor->id);
        $req->setCurrency(\Iyzipay\Model\Currency::TL);
        
        //echo "<pre>"; print_r($req); die;
        $subMerchant = \Iyzipay\Model\SubMerchant::update($req, $options);
        return Redirect::to(route('vendor'))
                        ->with('flash_alert_notice', 'Vendor was  successfully updated !');
    }
    /*
     *Delete User
     * @param ID
     * 
     */
    public function destroy(Vendor $vendor) {
        
        Vendor::where('id',$vendor->id)->delete();

        return Redirect::to(route('vendor'))
                        ->with('flash_alert_notice', 'Vendor was successfully deleted!');
    }

    public function show(Vendor $vendor) {
        
    }

}
