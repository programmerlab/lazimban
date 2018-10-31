<?php

namespace Modules\Admin\Http\Requests;

use App\Http\Requests\Request; 
 

class FeaturedProductRequest  extends Request {

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
                           // 'product'     => "required" ,                              
                        ];
                    }
                case 'PUT':
                case 'PATCH': {
                    if ( $product = $this->featuredProduct ) {

                        return [
                            //'product'     => "required" , 
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
    
    public function messages()
    {
        return [
            'title.required' => 'User name is required!',
            'description.required' => 'User message is required',
            'title.unique' => 'User name is already in use',
        ];
    }
}
