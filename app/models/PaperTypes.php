<?php
namespace App\Models;

// Model Base Helper
use App\Models\Helper\ModelBase as ModelBaseHelper;

class PaperTypes extends \Eloquent {
    /* Traits
    -------------------------------*/
    use ModelBaseHelper;
    
    /* Constants
    -------------------------------*/

    /* Public Properties
    -------------------------------*/
    public static $rules = [
        'en_name' => 'required',
        'ar_name' => 'required',
        'en_description' => 'required',
        'ar_description' => 'required',
        'cutoff_time_id' => 'required',
        'paper_printer_id' => 'required',
        'printer_api' => 'required',
    ];

    /* Protected Properties
    -------------------------------*/
    protected $dates = ['deleted_at'];
    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];
    protected $fillable = [
        'paper_printer_id', 'print_product_id', 'cutoff_time_id', 'en_description', 'ar_description',
        'printer_api', 'en_name', 'ar_name', 'position'
    ];
    
    /* Private Properties
    -------------------------------*/
    
    /* Public Methods
    -------------------------------*/

    /**
    *
    *
    *
    */

    /**
    * Scope for filtering by print product id
    *
    * @return self Query
    */
    public function scopePrintProductId($query, $printProductId)
    {
        return $query->where('print_product_id', '=', $printProductId);
    }

    /**
    * Get All Paper Type Details
    *
    * @return array
    */
    public function getAllPaperTypeDetails()
    {
        $paperTypes = self::all();
        $paperTypes->load('finishingFile', 'pricingFile');

        return $paperTypes;
    }

    /**
    * Get Paper Type Details
    *
    * @param int
    * @return array
    */
    public function getPaperTypeDetails($id)
    {
        $paperType = self::find($id);
        $paperType->load('finishingFile', 'pricingFile');

        return $paperType;
    }

    /**
    * Inverse Relation to Model PaperPrinters
    *
    * @return 'App\Models\PaperPrinters'
    */
    public function printer()
    {
        return $this->belongsTo('App\Models\PaperPrinters', 'paper_printer_id');
    }

    /**
    * Inverse Relation to Model PrintProducts
    *
    * @return 'App\Models\PrintProducts'
    */
    public function printProduct()
    {
        return $this->belongsTo('App\Models\PrintProducts', 'print_product_id');
    }

    /**
    * Relation to Model PaperFinihsing
    *
    * @return 'App\Models\PaperFinihsing'
    */
    public function paperFinishing()
    {
        return $this->hasMany('App\Models\PaperFinihsing', 'paper_type_id');
    }

    /**
    * Relation to Model PaperPricing
    *
    * @return 'App\Models\PaperPricing
    */
    public function paperPricing()
    {
        return $this->hasMany('App\Models\PaperPricing', 'paper_type_id');
    }

    /**
    * Relation to Model OrderItems
    *
    * @return 'App\Models\OrderItems
    */
    public function orderItems()
    {
        return $this->hasMany('App\Models\OrderItems', 'paper_type_id');
    }

    /**
    * Inverse Relation to Model CutOffTime
    *
    * @return 'App\Models\CutOffTime'
    */
    public function cutOff()
    {
        return $this->belongsTo('App\Models\CutOffTime', 'cutoff_time_id');
    }

    /**
    * Relation to Model FileUploads
    *
    * @return 'App\Models\FileUploads'
    */
    public function pricingFile()
    {
        return $this->belongsTo('App\Models\FileUploads', 'file_pricing');
    }

    /**
    * Relation to Model FileUploads
    *
    * @return 'App\Models\FileUploads'
    */
    public function finishingFile()
    {
        return $this->belongsTo('App\Models\FileUploads', 'file_finishing');
    }

    /* Protected Methods
    -------------------------------*/

    /* Private Methods
    -------------------------------*/
}