<?php
namespace App\Models;

// Model Base Helper traits
use App\Models\Helper\ModelBase as ModelBaseHelper;

class Groups extends \Eloquent {
    /* Traits
    -------------------------------*/
    use ModelBaseHelper;
    
    /* Constants
    -------------------------------*/
    const ADMINISTRATOR = 'administrator';
    const CUSTOMER = 'customer';

    /* Public Properties
    -------------------------------*/
    /* Protected Properties
    -------------------------------*/
    protected $hidden = ['permissions', 'deleted_at', 'created_at', 'updated_at'];

    /* Private Properties
    -------------------------------*/
    

    /* Public Methods
    -------------------------------*/

    /**
    * Get Customer Group
    *
    * @return object
    */
    public static function getCustomerGroup()
    {
        $group = NULL;
        
        try
        {   
            // get groups
            $group = \Sentry::findGroupByName(self::CUSTOMER);
        }
        catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
        {
            return $this->_setResponse(
                [
                    'message' => 'Customer Group Not Found.',
                    'reload' => 1
                ]
            , 500);
        }

        return $group;
    }

    /**
    * Get Administrator Group
    *
    * @return object
    */
    public static function getAdministratorGroup()
    {
        $group = NULL;
        
        try
        {   
            // get groups
            $group = \Sentry::findGroupByName(self::ADMINISTRATOR);
        }
        catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
        {
            return $this->_setResponse(
                [
                    'message' => 'Administrator Group Not Found.',
                    'reload' => 1
                ]
            , 500);
        }

        return $group;
    }

    /* Protected Methods
    -------------------------------*/

    /* Private Methods
    -------------------------------*/
}