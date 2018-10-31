<?php

namespace Modules\Admin\Http\Requests;

use App\Http\Requests\Request; 
 

class BlogRequest  extends Request {

    /**
     * The product validation rules.
     *
     * @return array
     */
    public function rules() {
            switch ( $this->method() ) {
                case 'GET':
                case 'DELETE': {
                        return [ ];
                    }
                case 'POST': {
                        return [
                            'title'     => "required|unique:blogs,title" ,                              
                            'description'       => 'required',                            
                            'image'             => 'required|mimes:jpeg,bmp,png,gif'
                        ];
                    }
                case 'PUT':
                case 'PATCH': {
                    if ( $product = $this->blog ) {

                        return [
                            'title'     => "required" ,                              
                            'description'       => 'required',                            
                            'image'             => 'mimes:jpeg,bmp,png,gif'
                        ];
                    }
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
