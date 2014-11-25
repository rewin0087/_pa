<?php
namespace App\Models;

// Model Base Helper
use App\Models\Helper\ModelBase as ModelBaseHelper;

class FinishingProductionsCategory extends \Eloquent {
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
    protected $fillable = ['code_name','en_name','ar_name','thumbnail_id'];
    protected $table = 'finishing_productions_category';

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