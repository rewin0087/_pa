<?php
namespace App\Models;
// Model Base Helper
use App\Models\Helper\ModelBase as ModelBaseHelper;

class UserLibrary extends \Eloquent {
    /* Traits
    -------------------------------*/
    use ModelBaseHelper;
    
    /* Constants
    -------------------------------*/

    /* Public Properties
    -------------------------------*/
    /* Protected Properties
    -------------------------------*/
    protected $table ='user_library';
    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];
    protected $dates = ['deleted_at'];

    /* Private Properties
    -------------------------------*/
    
    /* Public Methods
    -------------------------------*/

    /**
    *
    *
    */

    /**
    * Inverse Relation to Model User
    *
    * @return 'App\Models\User'
    */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    /**
    * Inverse Relation to Model OrderItems
    *
    * @return 'App\Models\OrderItems'
    */
    public function orderItems()
    {
        return $this->hasMany('App\Models\OrderItems', 'library_id');
    }

    /* Protected Methods
    -------------------------------*/

    /* Private Methods
    -------------------------------*/
}