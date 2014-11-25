<?php
namespace App\Models;

// Model Base Helper
use App\Models\Helper\ModelBase as ModelBaseHelper;

class UserAddress extends \Eloquent {
    /* Traits
    -------------------------------*/
    use ModelBaseHelper;
    
    /* Constants
    -------------------------------*/
    const USER_ADDRESS_TYPE = 1;
    const USER_ADDRESS_MAIN = 'main';

    /* Public Properties
    -------------------------------*/
    /* Protected Properties
    -------------------------------*/
    protected $table = 'user_contact_addresses';
    protected $fillable = [
        'name', 'postal_code1', 'postal_code2', 'user_id',
        'address', 'building_name', 'type', 'telephone_number',
        'is_corporate', 'is_primary', 'company_name', 'receiving_first_name',
        'receiving_last_name', 'furigana_first_name', 'furigana_last_name',
        'delivery_cutoff_time_id','country','city','area','street','floor','apartment',
        'nearest_landmark','mobile_number'
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
    public function scopeUserId($query, $UserId)
    {
        return $query->where('user_id', '=', $UserId);
    }
    
    public function user() {
        return $this->belongs_to('App\Models\User', 'user_id');
    }
}