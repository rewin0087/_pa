<?php
namespace App\Models;
// Model Base Helper
use App\Models\Helper\ModelBase as ModelBaseHelper;

class PaperPrinters extends \Eloquent {
    /* Traits
    -------------------------------*/
    use ModelBaseHelper;
    
    /* Constants
    -------------------------------*/

    /* Public Properties
    -------------------------------*/
    /* Protected Properties
    -------------------------------*/
    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];
    protected $dates = ['deleted_at'];
    protected $fillable = ['name', 'description', 'api_settings'];

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
}