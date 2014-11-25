<?php
namespace App\Controllers\Control\Resource\Products\Printing\PaperTypes;

use App\Controllers\Control as Control;
// model
use App\Models\FileUploads as FileUploadModel;
use App\Models\PaperTypes as PaperTypeModel;
use App\Models\PaperPricing as PaperPricingModel;
use App\Models\PaperFinishing as PaperFinishingModel;
// Vendor LIB
use Carbon\Carbon as DateCarbon;
// Queue Proccess
use App\Controllers\Control\Resource\Products\Printing\PaperTypes\Reloading\Finishing as FinishingProcess;
use App\Controllers\Control\Resource\Products\Printing\PaperTypes\Reloading\Pricing as PricingProcess;

class Reloading extends Control {

    protected $layout = NULL;

    /**
     * resource/product/printing/paper-types/reloading GET
     *
     * @return Response
     */
    public function index()
    {

        if( !isset($this->_inputs['paper_type_id']) )
        {
            return $this->_setResponse([
                'message' => 'Paper Type Not Found Please specify the Paper Type.'
            ], 500);
        }

        $paperType = PaperTypeModel::find($this->_inputs['paper_type_id']);

        if( !isset($paperType->id) )
        {
            return $this->_setResponse([
                'message' => 'Paper Type Not Found Please specify the Paper Type.'
            ], 500);
        }

        return $paperType;
    }

    /**
     * resource/product/printing/paper-types/reloading POST
     *
     * @return Response
     */
    public function store() 
    {

        if( !isset($this->_inputs['paper_type_id']) && $this->_inputs['paper_type_id'])
        {
            return $this->_setResponse([
                'message' => 'Paper Type Not Found Please specify the Paper Type.'
            ], 500);
        }

        $paperType = PaperTypeModel::find($this->_inputs['paper_type_id']);
        $timestamp = strtotime('now');

        # make default
        if( isset($this->_inputs['make_default']))
        {
            # make default finishing file
            if( isset($this->_inputs['finishing_default']) && $this->_inputs['finishing_default'] == 1 )
            {
                # soft delete paper finishing associated with current paper type
                PaperFinishingModel::wherePaperTypeId($this->_inputs['paper_type_id'])->activeList()
                    ->delete();
                # update trashed paper pricing to update status to timestamp
                PaperFinishingModel::wherePaperTypeId($this->_inputs['paper_type_id'])->activeList()
                    ->withTrashed()
                    ->update([
                        'status' => $timestamp
                    ]);
                # update waiting list to active list for finishing associated with current paper type
                PaperFinishingModel::wherePaperTypeId($this->_inputs['paper_type_id'])->waitingList()
                    ->update([
                        'status' => PaperFinishingModel::ACTIVE_LIST
                    ]);
            }

            # make default pricing file
            if( isset($this->_inputs['pricing_default']) && $this->_inputs['pricing_default'] == 1 )
            {
                $paperPricingModel = PaperPricingModel::wherePaperTypeId($this->_inputs['paper_type_id']);
                # soft delete paper pricing associated with current paper type
                PaperPricingModel::wherePaperTypeId($this->_inputs['paper_type_id'])->activeList()
                    ->delete();
                # update trashed paper pricing to update status to timestamp
                PaperPricingModel::wherePaperTypeId($this->_inputs['paper_type_id'])->activeList()
                    ->withTrashed()
                    ->update([
                        'status' => $timestamp
                    ]);
                # update waiting list to active list for pricing associated with current paper type
                PaperPricingModel::wherePaperTypeId($this->_inputs['paper_type_id'])->waitingList()
                    ->update([
                        'status' => PaperPricingModel::ACTIVE_LIST
                    ]);
            }

            return $paperType;
        }

        # get Finishing File
        $finishingFile = FileUploadModel::find($paperType->file_finishing);

        if( (isset($this->_inputs['finishing']) && $this->_inputs['finishing'] == 1) )
        {
            if( isset($finishingFile->id) )
            {
                # set finishing_list_reloaded to 1
                $paperType->finishing_list_reloaded = 1;
                # run queue
                \Queue::push('App\Queues\Finishing',
                    ['paper_type' => $paperType->id,
                    'file_finishing' => $finishingFile->id ]);
            }
            else
            {
                return $this->_setResponse([
                    'message' => 'Please Upload an Excel Finishing File.'
                ], 500);
            }
        }

        # get Pricing File
        $pricingFile = FileUploadModel::find($paperType->file_pricing);

        if( (isset($this->_inputs['pricing']) && $this->_inputs['pricing'] == 1) )
        {
            if( isset($pricingFile->id) )
            {
                # set price_list_reloaded to 1
                $paperType->price_list_reloaded = 1;
                # run queue
                \Queue::push('App\Queues\Pricing',
                    ['paper_type' => $paperType->id,
                    'file_pricing' => $pricingFile->id ]);
            } 
            else
            {
                return $this->_setResponse([
                    'message' => 'Please Upload an Excel Pricing File.'
                ], 500);
            }
        }

        $paperType->save();
        
        return $paperType;
    }
}