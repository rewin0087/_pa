<?php
namespace App\Models;

// Model Base Helper
use App\Models\Helper\ModelBase as ModelBaseHelper;

class UserInfo extends \Eloquent {
    /* Traits
    -------------------------------*/
    use ModelBaseHelper;
    
    /* Constants
    -------------------------------*/

    /* Public Properties
    -------------------------------*/

    /* Protected Properties
    -------------------------------*/
    protected $table = 'users_basic_info';
    protected $fillable = [
        'first_name', 'last_name', 'first_name_kana',
        'last_name_kana', 'remaining_points', 'used_space', 'company_name',
        'avatar_id', 'mobile_number', 'mobile_email'
    ];
    
    /* Private Properties
    -------------------------------*/
    
    /* Public Methods
    -------------------------------*/

    /**
    *
    *
    */

    /* Protected Methods
    -------------------------------*/

    /* Private Methods
    -------------------------------*/

    /* Relations
    -------------------------------*/

    /**
    * Scope for filtering by user id
    *
    * @return self Query
    */
    public function scopeUserId($query, $UserId)
    {
        return $query->where('user_id', '=', $UserId);
    }
    
    public function user() {
        return $this->belongs_to('App\Models\UserInfo', 'user_id');
    }

    // public function userAddress()
    // {
    //     return $this->belongsTo('App\Models\UserAddress', 'id');
    // }

    // public function postalCode1()
    // {
    //     return $this->belongsTo('App\Models\UserAddress', 'user_id');
    // }

    // public function postalCode2()
    // {
    //     return $this->belongsTo('App\Models\UserAddress', 'user_id');
    // }

    // public function buildingName()
    // {
    //     return $this->belongsTo('App\Models\UserAddress', 'user_id');
    // }

    // public function telephoneNumber()
    // {
    //     return $this->belongsTo('App\Models\UserAddress', 'user_id');
    // }
}