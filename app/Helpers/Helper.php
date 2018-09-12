<?php

namespace App\Helpers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Mail;
use Auth;
use Config;
use View;
use Input;
use session;
use Crypt;
use Hash;
use Menu;
use Html;
use Illuminate\Support\Str;
use App\User;
use Phoenix\EloquentMeta\MetaTrait; 
use Illuminate\Support\Facades\Lang;
use App\CorporateProfile;
use Validator; 
use App\Position;
use App\InterviewRating;
use App\Interview;
use App\Criteria;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\RatingFeedback;
use PHPMailerAutoload;
use PHPMailer;
use Illuminate\Support\Facades\DB;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class Helper {

    /**
     * function used to check stock in kit
     *
     * @param = null
     */
    
    public function generateRandomString($length) {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }

         return $key;
    } 

    public static function optimize($filename=null){
         if($filename!=null){
             $optimizerChain = \OptimizerChainFactory::create();
            $optimizerChain
               ->optimize($filename);    
        }
        
       
    }
    
    public static function FormatPhoneNumber($number){
        return preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3', $number). "\n";
    }
 
    
     public  function sendMailFrontEnd($email_content, $template)
    {        
        $email_content['verification_token'] =  Hash::make($email_content['receipent_email']);
        $email_content['email'] = isset($email_content['receipent_email'])?$email_content['receipent_email']:''; 
       //dd($email_content);
        $mail = new PHPMailer;
        $html = view::make('emails.'.$template,['content' => $email_content]);
        $html = $html->render(); 

        try {
            $mail->isSMTP(); // tell to use smtp
            $mail->CharSet = "utf-8"; // set charset to utf8
             

            $mail->SMTPAuth   = true;                  // enable SMTP authentication
            $mail->Host       = "6668.smtp.antispamcloud.com"; // sets the SMTP server
            $mail->Port       = 587;   
            $mail->SMTPSecure = 'false';                 // set the SMTP port for the GMAIL server
            $mail->Username   = "smtp@yellotasker.com"; // SMTP account username
            $mail->Password   = "E84FFBnDdtsPFoMAHnKy"; 

            $mail->setFrom("smtp@yellotasker.com", "yellotasker");
            $mail->Subject = $email_content['subject'];
            $mail->MsgHTML($html);
            $mail->addAddress($email_content['receipent_email'], "yellotasker");
            $mail->addAddress("kroy@mailinator.com","yellotasker"); 

            //$mail->addAttachment(‘/home/kundan/Desktop/abc.doc’, ‘abc.doc’); // Optional name
            $mail->SMTPOptions= array(
                    'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            $mail->send();
            //echo "success";
            } catch (phpmailerException $e) {
             
            } catch (Exception $e) {
             
            }



    } 
  /* @method : send Mail
    * @param : email
    * Response :  
    * Return : true or false
    */
    public  function sendMail($email_content, $template)
    {        
        
        $mail       = new PHPMailer;
        $html       = view::make('emails.'.$template,['content' => $email_content]);
        $html       = $html->render(); 
        $subject    = $email_content['subject'];

        try {
            $mail->isSMTP(); // tell to use smtp
            $mail->CharSet = "utf-8"; // set charset to utf8
             

            $mail->SMTPAuth   = true;                  // enable SMTP authentication
            $mail->Host       = "smtp.zoho.com"; // sets the SMTP server
            $mail->Port       = 587;   
            $mail->SMTPSecure = 'false';                 // set the SMTP port for the GMAIL server
            $mail->Username   = "support@krsdata.net"; // SMTP account username
            $mail->Password   = "support@123"; 

            $mail->setFrom("support@krsdata.net", "Admin");
            $mail->Subject = $subject;
            $mail->MsgHTML($html);
            $mail->addAddress($email_content['receipent_email'], "admin");
            
           // $mail->addReplyTo("kroy.iips@mailinator.com","admin");
            //$mail->addBCC(‘examle@examle.net’);
            //$mail->addAttachment(‘/home/kundan/Desktop/abc.doc’, ‘abc.doc’); // Optional name
            $mail->SMTPOptions= array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
            );

            $mail->send();
            //echo "success";
            } catch (phpmailerException $e) {
             
            } catch (Exception $e) {
             
            }
    }
    
    public static function contactusEmail($template_content)
    {        
        $mail = new PHPMailer;
        $html = view::make('emails.contact_us',['data' => $template_content]);
        $html = $html->render(); 
        //echo "<pre>"; print_r($html); die;
        try {
            $mail->isSMTP(); // tell to use smtp
            $mail->CharSet = "utf-8"; // set charset to utf8
             

            $mail->SMTPAuth   = true;                  // enable SMTP authentication
            $mail->Host       = "smtp.zoho.com"; // sets the SMTP server
            $mail->Port       = 587;   
            $mail->SMTPSecure = 'false';                 // set the SMTP port for the GMAIL server
            $mail->Username   = "support@krsdata.net"; // SMTP account username
            $mail->Password   = "support@123"; 

            $mail->setFrom("support@krsdata.net", "Admin");
            $mail->Subject = 'User wants to contact you';
            $mail->MsgHTML($html);
            $admin = DB::table('admin')->where('id', 1)->first();
            $mail->addAddress($admin->email, "New User");
           
            //$mail->addAttachment(‘/home/kundan/Desktop/abc.doc’, ‘abc.doc’); // Optional name
            $mail->SMTPOptions= array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
            );

            $mail->send();
            //echo "success";
            } catch (phpmailerException $e) {
             
            } catch (Exception $e) {
             
            }
         
       
    }
    /* @method : send Mail
    * @param : email
    * Response :  
    * Return : true or false
    */
    public  function sendNotificationMail($email_content, $template)
    {        
        
        return  Mail::send('emails.'.$template, array('content' => $email_content), function($message) use($email_content)
          {
            $name = $_SERVER['SERVER_NAME'];
            $message->from('no-reply@abc.com',$name);  
            $message->to($email_content['receipent_email'])->subject($email_content['subject']);
            
          });
    }

   

    public  static function sendInvoiceMail($email_content, $template, $template_content)
    {        
        Helper::sendEmail( $email_content, $template, $template_content);

    } 


    public static function sendEmail( $email_content, $template, $template_content)
    {
        $mail = new PHPMailer;
        $html = view::make('emails.invoice',['data' => $template_content]);
        $html = $html->render(); 

        try {
            $mail->isSMTP(); // tell to use smtp
            $mail->CharSet = "utf-8"; // set charset to utf8
             

            $mail->SMTPAuth   = true;                  // enable SMTP authentication
            $mail->Host       = "smtp.zoho.com"; // sets the SMTP server
            $mail->Port       = 587;   
            $mail->SMTPSecure = 'false';                 // set the SMTP port for the GMAIL server
            $mail->Username   = "support@krsdata.net"; // SMTP account username
            $mail->Password   = "support@123"; 

            $mail->setFrom("support@krsdata.net", "Admin");
            $mail->Subject = 'Invoice';
            $mail->MsgHTML($html);
            $mail->addAddress($email_content['receipent_email'], "admin");
           
            //$mail->addAttachment(‘/home/kundan/Desktop/abc.doc’, ‘abc.doc’); // Optional name
            $mail->SMTPOptions= array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
            );

            $mail->send();
            //echo "success";
            } catch (phpmailerException $e) {
             
            } catch (Exception $e) {
             
            }
         
       
    }
    
    public static function  getVendorName($productid=null)
    {
        $product = DB::table('products')->where('id', $productid)->first();
        
        if($product!=null && $product->created_by){
            $vendor = DB::table('admin')->where('id', $product->created_by)->first();
            return $vendor->company_name; 
        }else{
            return null;
        }
    }
    
    public static function  getVendorKey($productid=null)
    {
        $product = DB::table('products')->where('id', $productid)->first();
        
        if($product!=null && $product->created_by){
            $vendor = DB::table('admin')->where('id', $product->created_by)->first();
            return $vendor->vendor_key; 
        }else{
            return null;
        }
    }
    
    public static function  getCommission($productid=null)
    {
        $product = DB::table('products')->where('id', $productid)->first();
        
        if($product!=null){
            $cat = DB::table('categories')->where('id', $product->product_category)->first();
            return $cat->commission; 
        }else{
            return null;
        }
    }
     
    public static function getComments($productid=null)
    {

        $data =  \DB::table('comments')->where('product_id',$productid)->orderBy('id','desc')->get();

         return $data;
                
    }
    
    public function  getBreadcrumbs($product_cat_id=null,$crumbs='')
    {
        $helper = new Helper;
        
        if(!is_numeric($product_cat_id)){            
            $category = DB::table('categories')->where('name', $product_cat_id)->first();
            $product_cat_id = $category->id;
        }
        
        //echo $helper->getParent($product_cat_id);die;
            if($helper->getParent($product_cat_id)){                
                $parentid =  $helper->getParent($product_cat_id);
                
                $crumbs[] =  $parentid;
                if($parentid) {  return $helper->getBreadcrumbs($parentid,$crumbs); }else { return ''; }
            }else{
                //print_r($crumbs); die;
                
                $str = '';
                if(!empty($crumbs)){
                    krsort($crumbs);
                    foreach($crumbs as $c){
                        $cat = DB::table('categories')->where('id', $c)->first();                
                        $str .= $cat->name.' > ';
                    }   
                }                
                
                //print_r($str); die;
                return $str; 
            }
        
    }
    
    public static function  getParent($cat_id=null)
    {    
        $cat = DB::table('categories')->where('id', $cat_id)->first();
        
        if($cat!=null){            
                return $cat->parent_id;                 
        }else{
            return 0;
        }
    }
    
    public static function  getProduct($p_id=null)
    {    
        $product = DB::table('products')->where('id', $p_id)->first();
        
        if($product!=null){            
                return $product;                 
        }else{
            return 0;
        }
    }
    
    public static function  getGoogleTag()
    {        
        $google_tag = DB::table('settings')->where('field_key', 'google_tag')->first();                
        
        //print_r($vendor); die;
        if($google_tag!=null){
           // $vendor = DB::table('admin')->where('id', $userid)->first(); 
            return $google_tag->field_value; 
        }else{
            return null;
        }
    }
    
    public static function  getGoogleAnalytic()
    {        
        $google_tag = DB::table('settings')->where('field_key', 'google_analytic')->first();                
        
        //print_r($vendor); die;
        if($google_tag!=null){
           // $vendor = DB::table('admin')->where('id', $userid)->first(); 
            return $google_tag->field_value; 
        }else{
            return null;
        }
    }
    
    public static function  getSociallink()
    {        
        $fb_id = DB::table('settings')->where('field_key', 'fb_id')->first();
        $twitter_id = DB::table('settings')->where('field_key', 'twitter_id')->first();
        $linkedin_id = DB::table('settings')->where('field_key', 'linkedin_id')->first();
        $pinterest_id = DB::table('settings')->where('field_key', 'pinterest_id')->first();
        $instagram_id = DB::table('settings')->where('field_key', 'instagram_id')->first();
        $flicker_id = DB::table('settings')->where('field_key', 'flicker_id')->first();
        $google_id = DB::table('settings')->where('field_key', 'google_id')->first();
        $skype_id = DB::table('settings')->where('field_key', 'skype_id')->first();
        $youtube_id = DB::table('settings')->where('field_key', 'youtube_id')->first();
        
        $arr =  ['fb_id'=>$fb_id->field_value,'twitter_id'=>$twitter_id->field_value,'linkedin_id'=>$linkedin_id->field_value,
                 'pinterest_id'=>$pinterest_id->field_value,'instagram_id'=>$instagram_id->field_value,'flicker_id'=>$flicker_id->field_value,
                 'google_id'=>$google_id->field_value,'skype_id'=>$skype_id->field_value,'youtube_id'=>$youtube_id->field_value];         
        if($arr!=null){
           //print_r($arr); die;
           return $arr; 
        }else{
            return null;
        }
    }
    
    public static function  getPages()
    {        
        $pages = DB::table('pages')->get();                                
        if($pages!=null){        
            return $pages; 
        }else{
            return null;
        }
    }
}
