<?php
namespace App\Models;

// Traits for softDelete
use Illuminate\Database\Eloquent\SoftDeletingTrait;
// Model Base Helper
use App\Models\Helper\ModelBase as ModelBaseHelper;

class PaperFinishing extends \Eloquent {
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
    /* Protected Properties
    -------------------------------*/
    protected $table = 'paper_finishing';
    protected $fillable = [
        'paper_type_id', 'paper_size_id', 'turn_around',
        'price_per_copy', 'min_folded_size', 'minimum_price_needed', 'productions',
        'production_category', 'status'
    ];
    
    /* Private Properties
    -------------------------------*/
    
    /* Public Methods
    -------------------------------*/

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
    * Scope for filtering by paper_type_id
    *
    * @return self Query
    */
    public function scopePaperTypeId($query, $paper_type_id)
    {
        return $query->where('paper_type_id', '=', $paper_type_id);
    }

    /**
    * Scope for filtering by productions
    *
    * @return self Query
    */
    public function scopeProduction($query, $production)
    {
        return $query->where('productions', '=', $production);
    }

    /**
    * Scope for filtering by production category
    *
    * @return self Query
    */
    public function scopeProductionCategory($query, $production_category)
    {
        return $query->where('production_category', '=', $production_category);
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
    *
    *
    */

    /* Protected Methods
    -------------------------------*/

    /* Private Methods
    -------------------------------*/
}