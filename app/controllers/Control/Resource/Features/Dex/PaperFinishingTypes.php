<?php
namespace App\Controllers\Control\Resource\Features\Dex;

use App\Controllers\Control as Control;
// models
use App\Models\PaperFinishingTypes as PaperFinishingTypeModel;
use App\Models\PaperFinishingTypeOptions as PaperFinishingTypeOptionModel;

class PaperFinishingTypes extends Control {

    /**
    * Data to be fill after updating the the data
    *
    */
    private $_data = [];

    /**
     * Store a newly created resource in storage.
     * POST /control/home
     *
     * @return Response
     */
    public function store() 
    {
        $types = $this->_inputs;
        # store definitions
        if( !empty($types) && ( isset($types[0]) && !empty($types[0]) ) )
        {
            foreach($types as $i => $type)
            {
                $this->_store($i, $type);
            }
            # return updated data
            return $this->_data;
        }
        # return error if there are errors
        return $this->_setResponse([
            'message' => 'Collection of paper finishing types must not empty.'
        ], 500);
    }

    /**
     * Validation
     *
     * @param array
     *
     * @return object
     */
    private function _validator($data) 
    {
        # set rules
        $rules = [
            'code_name' => ['required'],
            'name_en' => ['required'],
            'name_jp' => ['required']
        ];

        # validator
        return \Validator::make($data, $rules);
    }

    /**
     * Store each record to the database (parent type)
     *
     * @param array
     *
     * @return void
     */
    private function _store($index, $data) 
    {
        # check if code_name exist
        if(!isset($data['code_name']) && $data['code_name'])
        {
            return $this->_setResponse(['message' => 'Code Name Must not empty.'], 500);
        }

        # get type if exist
        $type = PaperFinishingTypeModel::where('dex_code', '=', $data['code_name'])->get();

         # validator
        $validator = $this->_validator($data);

        # return error if there are errors
        if($validator->fails())
        {
            return $this->_setResponse([
                'message' => $validator->messages()->first()
            ], 500);
        }
        else
        {
            # convert to array
            $type_array = $type->toArray();

            # update
            if( !empty($type_array) && (isset($type_array[0]) && !empty($type_array[0])) )
            {
                $type = PaperFinishingTypeModel::find($type_array[0]['id']);
                $type->dex_en_name = $data['name_en'];
                $type->dex_ar_name = $data['name_jp'];
                $type->dex_code = $data['code_name'];
                # save now
                $type->save();
                # push to data record
                $this->_data[$index] = $type;
                # save options
                if(isset($data['options']) && !empty($data['options']))
                {
                    $this->_storeOptions($index, $data['options'], $type);
                }
            }  
            # save
            else
            {
                $finishingType = new PaperFinishingTypeModel;
                $finishingType->dex_en_name = $data['name_en'];
                $finishingType->dex_ar_name = $data['name_jp'];
                $finishingType->dex_code = $data['code_name'];
                # save now
                $finishingType->save();
                # push to data record
                $this->_data[$index] = $finishingType;
                # save options
                if(isset($data['options']) && !empty($data['options']))
                {
                    $this->_storeOptions($index, $data['options'], $finishingType);
                }
            }
        }
    }

    /**
     * Store each record to the database (type options)
     *
     * @param integer
     * @param array
     * @param 'App\Models\PaperFinishingTypes' Model
     * @return void
     */
    private function _storeOptions($index, $PaperFinishingTypeOptions, $finishingType) 
    {
        # get FinishingType Data
        $finishingTypeData = PaperFinishingTypeModel::find($finishingType->id);

        foreach($PaperFinishingTypeOptions as $i => $option)
        {
            if(!empty($option))
            {
                $options = [];
                foreach($option as $type_option)
                {
                    # check if finishing type option exist
                    $option = PaperFinishingTypeOptionModel::finishingTypeId($finishingType->id)
                        ->dexCode($type_option['code_name'])
                        ->get()
                        ->toArray();
                    
                    # update
                    if( !empty($option) && (isset($option[0]) && !empty($option[0])) )
                    {
                        $getOptionData = PaperFinishingTypeOptionModel::find($option[0]['id']);
                        $getOptionData->dex_en_name = $type_option['name_en'];
                        $getOptionData->dex_ar_name = $type_option['name_jp'];
                        $getOptionData->dex_code = $type_option['code_name'];
                        $getOptionData->option_num = $i;
                        # push $getOptionData object to options
                        $options[] = $getOptionData;
                    }
                    # save
                    else 
                    {
                        $newOption = new PaperFinishingTypeOptionModel;
                        $newOption->dex_en_name = $type_option['name_en'];
                        $newOption->dex_ar_name = $type_option['name_jp'];
                        $newOption->dex_code = $type_option['code_name'];
                        $newOption->option_num = $i;
                        # push $newOption object to options
                        $options[] = $newOption;
                    }
                }

                # commit everything to database
                $this->_data[$index]['options'] = $finishingTypeData
                    ->paperOptions()
                    ->saveMany($options);
            }
        }
    }

}
