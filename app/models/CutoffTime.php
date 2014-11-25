<?php
namespace App\Models;

// Traits for softDelete
use Illuminate\Database\Eloquent\SoftDeletingTrait;
// Model Base Helper traits
use App\Models\Helper\ModelBase as ModelBaseHelper;

class CutoffTime extends \Eloquent {
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
    protected $table = 'cutoff_time';
    protected $dates = ['deleted_at'];
    protected $fillable = ['label', 'value', 'order'];

    /* Private Properties
    -------------------------------*/
    
    /* Public Methods
    -------------------------------*/

    /**
    * Relation to Model PaperTypes
    *
    * @return 'App\Models\PaperTypes'
    */
    public function paperType()
    {
        return $this->hasMany('App\Models\PaperTypes', 'cutoff_time_id');
    }

    /**
    *
    *
    *
    */

    /* Protected Methods
    -------------------------------*/

    /* Private Methods
    -------------------------------*/
}