<?php
namespace App\Controllers\Control\Products\Printing\PaperTypes;

use App\Controllers\Control as Control;
// model
use App\Models\FileUploads as FileUploadModel;
use App\Models\PaperTypes as PaperTypeModel;
// Queue Proccess
use App\Controllers\Control\Resource\Products\Printing\PaperTypes\Reloading\Finishing as FinishingProcess;
use App\Controllers\Control\Resource\Products\Printing\PaperTypes\Reloading\Pricing as PricingProcess;

class Reloading extends Control {

    /**
     * product/printing/paper-type/reloading Page
     *
     * @return Response
     */
    public function index($paper_type_id, $en_name) {

        // $paperType = PaperTypeModel::find($paper_type_id);

        // # get Finishing File
        // $finishingFile = FileUploadModel::find($file_finishing);

        // if( isset($finishingFile->id) )
        // {
        //     # set finishing_list_reloaded to 1
        //     $paperType->finishing_list_reloaded = 1;
        //     # run queue
        //     \Queue::push('App\Queues\Finishing',
        //         ['paper_type' => $paperType->id,
        //         'file_finishing' => $finishingFile->id ]);
        // }

        // # get Pricing File
        // $pricingFile = FileUploadModel::find($file_pricing);

        // if( isset($pricingFile->id) )
        // {
        //     # set price_list_reloaded to 1
        //     $paperType->price_list_reloaded = 1;
        //     # run queue
        //     \Queue::push('App\Queues\Pricing',
        //         ['paper_type' => $paperType->id,
        //         'file_pricing' => $pricingFile->id ]);
        // }

        // $paperType->save();

        // set template
        $this->_template = \View::make('control.products.printing.paper-type.reloading')
            ->with('paper_type_id', $paper_type_id)
            ->with('en_name', $en_name);
            
        // render page 
        $this->_appendTitle(' | Paper type Reloading')
            ->_setClass('product-printing-paper-type-reloading-page')
            ->_renderPage();
    }
}