<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\BlogRequest;
use Modules\Admin\Models\User;
use Modules\Admin\Models\Blog;
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

/**
 * Class AdminController
 */
class BlogController extends Controller {
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
        View::share('viewPage', 'blog');
        View::share('helper',new Helper);
        $this->record_per_page = Config::get('app.record_per_page');
    }

    protected $categories;

    /*
     * Dashboard
     * */

    public function index(Blog $blog, Request $request) 
    { 
       $page_title = 'Blogs';
        $page_action = 'View Blogs'; 
        if ($request->ajax()) {
            $id = $request->get('id'); 
            $category = Blog::find($id); 
            $category->status = $s;
            $category->save();
            echo $s;
            exit();
        }
         
        $vendor_id = $request->session()->get('current_vendor_id');
        
        if($request->session()->get('current_vendor_type') != 1){
            $blogs = $blog->where('user_id',$vendor_id)->orderBy('id','desc')->Paginate($this->record_per_page);
        }else{
            $blogs = $blog->orderBy('id','desc')->Paginate($this->record_per_page);
        }
        
        //echo "<pre>"; print_r($blogs); die;

        return view('packages::blog.index', compact('blogs', 'page_title', 'page_action','helper'));
   
    }

    /*
     * create  method
     * */

    public function create(Blog $blog, Request $request) 
    {        
        $page_title = 'Blog';
        $page_action = 'Create Blog';
         
        return view('packages::blog.create', compact('categories','cat','category','blog','sub_category_name', 'page_title', 'page_action'));
     }

    /*
     * Save Group method
     * */


   

    public function store(BlogRequest $request, Blog $blog) 
    {                       
        $vendor_id = $request->session()->get('current_vendor_id');
        //echo "<pre>"; print_r($blog); die;

        if ($request->file('image')) { 
            $photo = $request->file('image');
            $destinationPath = storage_path('uploads/blogs');
            $photo->move($destinationPath, time().$photo->getClientOriginalName());
            $photo_name = time().$photo->getClientOriginalName();
            $request->merge(['photo'=>$photo_name]);
           
            $blog->title      =   $request->get('title');
            if($request->get('slug') && !empty($request->get('slug'))){
                $blog->slug              =   strtolower(str_replace(" ", "-", $request->get('slug')));  
                $pro_slug   = strtolower(str_replace(" ", "-", $request->get('slug')));
                $url        = $cat_url.$pro_slug;  
            }else{
                $blog->slug              =   strtolower(str_replace(" ", "-", $request->get('title')));
                $pro_slug   = strtolower(str_replace(" ", "-", $request->get('title')));
                $url        = $pro_slug;
            }
            //echo $photo_name; die;
                                    
            $blog->description        =   $request->get('description');            
            $blog->image              =   $photo_name;            
            $blog->user_id            =   $vendor_id;
            $blog->slug               =   $url;  

            //echo "<pre>"; print_r($blog); die;
            DB::table('blogs')->insert(
                ['title' => $request->get('title'),
                 'description' => $request->get('description'),
                 'image' => $photo_name,
                 'tags' => $request->get('tags'),
                 'user_id' => 1,
                 'slug' => $url,
                 ]
            );
            //$blog->save(); 

        } 
       
        return Redirect::to(route('blog'))
                            ->with('flash_alert_notice', 'New Blog was successfully created !');
    }
    /*
     * Edit Group method
     * @param 
     * object : $category
     * */

    public function edit(Blog $blog) {

        $page_title = 'Blog';
        $page_action = 'Show Blog';                         

        return view('packages::blog.edit', compact( 'blog', 'page_title', 'page_action'));
    }

    public function update(BlogRequest $request, Blog $blog) 
    {        
        
         if ($request->file('image')) { 

            $photo = $request->file('image');
            //$destinationPath = base_path() . '/public/uploads/blogs/';
            $destinationPath = storage_path('uploads/blogs');
            $photo->move($destinationPath, time().$photo->getClientOriginalName());
            $photo_name = time().$photo->getClientOriginalName();
            $request->merge(['photo'=>$photo_name]);
           
            $blog->title      =   $request->get('title');
            if($request->get('slug') && !empty($request->get('slug'))){
                $blog->slug              =   strtolower(str_replace(" ", "-", $request->get('slug')));  
                $pro_slug   = strtolower(str_replace(" ", "-", $request->get('slug')));
                $url        = $pro_slug;  
            }else{
                $blog->slug              =   strtolower(str_replace(" ", "-", $request->get('blog_title')));
                $pro_slug   = strtolower(str_replace(" ", "-", $request->get('blog_title')));
                $url        = $pro_slug;
            }
            
            $blog->description        =   $request->get('description');
            $blog->image              =   $photo_name;            
            
            if($request->get('title')){
                $blog->title  = $request->get('title');
            }
            
            DB::table('blogs')
                    ->where('id', $blog->id)
                    ->update(['title' => $request->get('title'),
                                'description' => $request->get('description'),
                                'tags' => $request->get('tags'),
                                'image' => $photo_name]);
            //$blog->save(); 
        }else{            
            $blog->title      =   $request->get('title');
            if($request->get('slug') && !empty($request->get('slug'))){
                $blog->slug              =   strtolower(str_replace(" ", "-", $request->get('slug')));  
                $pro_slug   = strtolower(str_replace(" ", "-", $request->get('slug')));
                $url        = $pro_slug;  
            }else{
                $blog->slug              =   strtolower(str_replace(" ", "-", $request->get('blog_title')));
                $pro_slug   = strtolower(str_replace(" ", "-", $request->get('blog_title')));
                $url        = $pro_slug;
            }
            
            $blog->description        =   $request->get('description');
            $blog->image              =   $request->get('images');
            
            //echo "<pre>"; print_r($blog); die;
            if($request->get('title')){
                $blog->title  = $request->get('title');
            }
            
            DB::table('blogs')
                    ->where('id', $blog->id)
                    ->update(['title' => $request->get('title'),
                                'description' => $request->get('description'),
                                'tags' => $request->get('tags'),
                                'image' => $request->get('images')]);
            //$blog->save(); 
        }
        return Redirect::to(route('blog'))
                        ->with('flash_alert_notice', 'Blog was  successfully updated !');
    }
    /*
     *Delete User
     * @param ID
     * 
     */
    public function destroy(Blog $blog) {
        
        Blog::where('id',$blog->id)->delete();

        return Redirect::to(route('blog'))
                        ->with('flash_alert_notice', 'Blog was successfully deleted!');
    }

    public function show(Blog $blog) {
        
    }

}
