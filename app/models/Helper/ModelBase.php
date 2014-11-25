<?php
namespace App\Models\Helper;

trait ModelBase {

    /* Constants
    -------------------------------*/

    /* Public Properties
    -------------------------------*/
    /* Protected Properties
    -------------------------------*/
    
    /* Private Properties
    -------------------------------*/
    
    /* Public Methods
    -------------------------------*/

    /**
    * Get Model Instance
    *
    */
    public static function i()
    {
        $class = __CLASS__;

        return new $class;
    }

    /**
    * Return response json
    *
    * @param array
    * @param int
    * return json
    */
    protected function _setResponse($response, $code)
    {
        return \Response::json($response, $code);
    }
    
    /**
    *
    *
    */

    /* Protected Methods
    -------------------------------*/

    /* Private Methods
    -------------------------------*/
}
//