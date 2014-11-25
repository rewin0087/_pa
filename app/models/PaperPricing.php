<?php
namespace App\Models;

// Traits for softDelete
use Illuminate\Database\Eloquent\SoftDeletingTrait;
// Model Base Helper
use App\Models\Helper\ModelBase as ModelBaseHelper;

class PaperPricing extends \Eloquent {
    /* Traits
    -------------------------------*/
    use SoftDeletingTrait;
    use ModelBaseHelper;
    
    /* Constants
    -------------------------------*/
    const ACTIVE_LIST = 1;
    const WAITING_LIST = 2;

    /* Public Properties
    -------------------------------*/
    public static $rules = [
        'quantity' => 'required',
        'tat' => 'required',
        'price' => 'required',
        'status' => 'required'
    ];

    /* Protected Properties
    -------------------------------*/
    protected $table = 'paper_pricing';
    protected $dates = ['deleted_at'];
    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];
    protected $fillable = [
        'quantity', 'tat', 'price', 'status', 'paper_type_id', 'paper_size_id', 'paper_color_id'
    ];

    /* Private Properties
    -------------------------------*/
    
    /* Public Methods
    -------------------------------*/

    /**
    * Scope for filtering by tat
    *
    * @return self Query
    */
    public function scopeTat($query, $tat)
    {
        return $query->where('tat', '=', $tat);
    }

    /**
    * Scope for filtering by quantity
    *
    * @return self Query
    */
    public function scopeQuantity($query, $quantity)
    {
        return $query->where('quantity', '=', $quantity);
    }

    /**
    * Scope for filtering by paper_size_id
    *
    * @return self Query
    */
    public function scopePaperSizeId($query, $paper_size_id)
    {
        return $query->where('paper_size_id', '=', $paper_size_id);
    }

    /**
    * Scope for filtering by paper_color_id
    *
    * @return self Query
    */
    public function scopePaperColorId($query, $paper_color_id)
    {
        return $query->where('paper_color_id', '=', $paper_color_id);
    }

    /**
    * Scope for filtering by paper_type_id
    *
    * @return self Query
    */
    public function scopePaperTypeId($query, $paper_type_id)
    {
        return $query->where('paper_type_id', '=', $paper_type_id);
    }

    /**
    * Scope for filtering by Active List
    *
    * @return self Query
    */
    public function scopeActiveList($query)
    {
        return $query->where('status', '=', self::ACTIVE_LIST);
    }

    /**
    * Scope for filtering by Waiting List
    *
    * @return self Query
    */
    public function scopeWaitingList($query)
    {
        return $query->where('status', '=', self::WAITING_LIST);
    }

    /**
    * Inverse Relation to Model PaperTypes
    *
    * @return 'App\Models\PaperTypes'
    */
    public function paperType()
    {
        return $this->belongsTo('App\Models\PaperTypes', 'paper_type_id');
    }

    /**
    * Inverse Relation to Model PaperSizes
    *
    * @return 'App\Models\PaperSizes'
    */
    public function paperSize()
    {
        return $this->belongsTo('App\Models\PaperSizes', 'paper_size_id');
    }

    /**
    * Inverse Relation to Model PaperColors
    *
    * @return 'App\Models\PaperColors'
    */
    public function paperColor()
    {
        return $this->belongsTo('App\Models\PaperColors', 'paper_color_id');
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