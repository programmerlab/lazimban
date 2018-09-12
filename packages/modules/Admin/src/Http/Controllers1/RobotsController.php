<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Illuminate\Http\Request;
use Modules\Admin\Models\User;
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

/**
 * Class AdminController
 */
class RobotsController extends Controller {
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
        View::share('viewPage', 'setting');
        View::share('helper',new Helper);
        $this->record_per_page = Config::get('app.record_per_page');
    }
   
    
    public function robots(Request $request) 
    {
        
        $page_title = 'Upload robots.txt';
        $page_action = 'robots.txt';
        
        
                        
            if ($request->file('robots')) {
                $ext = pathinfo($request->file('robots'), PATHINFO_EXTENSION);
                //echo $request->file('robots'); die;
                if($ext != '.txt'){
                   //return Redirect::to(url('admin/robots'))
                   //     ->with('flash_alert_notice1', 'file was not supported!'); 
                }
                $photo = $request->file('robots');
                $destinationPath = base_path(); // Path of application root)
                $photo->move($destinationPath, 'robots.txt');
                
                       
            return Redirect::to(url('admin/robots'))
                        ->with('flash_alert_notice2', 'file was successfully updated!');
            }
        
        
        return view('packages::robots.edit', compact('setting','page_title', 'page_action'));
    }
    
    public function uploadRobots(Request $request) 
    {
        die;
            //print_r($request->file('robots')); die;
            //if ($request->file('robots')) {      
            //    $photo = $request->file($key);
            //    $destinationPath = storage_path('files/banner/');
            //    $photo->move($destinationPath, time().$photo->getClientOriginalName());
            //    $banner_image1 = time().$photo->getClientOriginalName();
            //    
            //    $setting = Settings::firstOrCreate(['field_key' => $key]);
            //
            //    $setting->field_key     =   $key;
            //    $setting->field_value   =   $banner_image1;
            //    $setting->save(); 
            //   
            //}
            //return Redirect::to(route('admin/robots'));
      
    }

}
