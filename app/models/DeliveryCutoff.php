<?php
namespace App\Models;

// Traits for softDelete
use Illuminate\Database\Eloquent\SoftDeletingTrait;
// Model Base Helper traits
use App\Models\Helper\ModelBase as ModelBaseHelper;

class DeliveryCutoff extends \Eloquent {
    /* Traits
    -------------------------------*/
    use SoftDeletingTrait;
    use ModelBaseHelper;
    
    /* Constants
    -------------------------------*/

    /* Public Properties
    -------------------------------*/
    /* Protected Properties
    -------------------------------*/
    protected $table = 'delivery_cutoff';
    protected $dates = ['deleted_at'];
    protected $fillable = ['value', 'order'];

    /* Private Properties
    -------------------------------*/
    
    /* Public Methods
    -------------------------------*/

    /**
    *
    *
    */

    /**
    * Relation to Model OrderShipping
    *
    * @return 'App\Models\OrderShipping'
    */
    public function orderShipping()
    {
        return $this->hasMany('App\Models\OrderShipping', 'delivery_cutoff_id');
    }

    /* Protected Methods
    -------------------------------*/

    /* Private Methods
    -------------------------------*/
}