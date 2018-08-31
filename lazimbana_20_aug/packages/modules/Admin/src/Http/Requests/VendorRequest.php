<?php

namespace Modules\Admin\Http\Requests;

use App\Http\Requests\Request;
use Input;

class VendorRequest extends Request {

    /**
     * The metric validation rules.
     *
     * @return array
     */
    public function rules() {
        //if ( $metrics = $this->metrics ) {
            switch ( $this->method() ) {
                case 'GET':
                case 'DELETE': {
                        return [ ];
                    }
                case 'POST': {
                        return [
                            'email'   => "required|email|unique:admin,email" ,  
                            'full_name' => 'required|min:3',
                            'vendor_type' => 'required',
                            'company_name' => 'required|min:3',
                            'phone' => 'required', 
                            'password' => 'required|min:6',
                            /*'confirm_password' => 'required|same:password'*/ 
                        ];
                    }
                case 'PUT':
                case 'PATCH': {
                   

                        return [
                            'email'   => "required|email|unique:admin,email" ,  
                            'full_name' => 'required|min:3',
                            'vendor_type' => 'required',
                            'company_name' => 'required|min:3',
                            'phone' => 'required',
                            'last_name' => 'required',
                        ];
                    
                }
                default:break;
            }
        //}
    }

    /**
     * The
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

}
