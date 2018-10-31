<?php

namespace Modules\Admin\Http\Requests;

use App\Http\Requests\Request; 
 

class SizeRequest  extends Request {

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
                            'title'     => "required|unique:sizes,title" ,                                                          
                        ];
                    }
                case 'PUT':
                case 'PATCH': {
                    if ( $product = $this->size ) {

                        return [
                            'title'     => "required" ,                                                          
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
