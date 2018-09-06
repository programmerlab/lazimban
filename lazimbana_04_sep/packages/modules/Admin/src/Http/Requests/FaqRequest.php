<?php

namespace Modules\Admin\Http\Requests;

use App\Http\Requests\Request; 
 

class FaqRequest  extends Request {

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
                            'title'     => "required" ,                              
                            'description'       => 'required'                                                        
                        ];
                    }
                case 'PUT':
                case 'PATCH': {
                    if ( $product = $this->faq ) {

                        return [
                            'title'     => "required" ,                              
                            'description'       => 'required'
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
