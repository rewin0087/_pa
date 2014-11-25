<?php
namespace App\Controllers\Control\Resource\Features\Dex;

use App\Controllers\Control as Control;
// models
use App\Models\BadDataErrorOptions as BadDataErrorOptionModel;
use App\Models\BadDataErrors as BadDataErrorModel;

class BadDataErrors extends Control {

    /**
    * Data to be fill after updating the the data
    *
    */
    private $_data = [];

    /**
     * Store a newly created resource in storage.
     * POST /control/resource/features/dex/bad-data-errors
     *
     * @return Response
     */
    public function store() {
        $badErrors = $this->_inputs;
        # store difinitions
        if( !empty($badErrors) && ( isset($badErrors[0]) && !empty($badErrors[0]) ) )
        {
            foreach($badErrors as $i => $badError) 
            {
                $this->_store($i, $badError);
            }
            # return updated data
            return $this->_data;
        }
        // return error if there are errors
        return $this->_setResponse([
            'message' => 'Collection of Bad Errors must not empty.'
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
            'name_english' => ['required'],
            'name_japanese' => ['required'],
            'description_english' => ['required'],
            'description_japanese' => ['required'],
            'category' => ['required']
        ];

        # validator
        return \Validator::make($data, $rules);
    }

    /**
     * Store each record to the database (parent BadError)
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
            return $this->_setResponse([
                'message' => 'Code Name Must not empty.'
            ], 500);
        }

        # get badError data if exist
        $badError = BadDataErrorModel::where('dex_code', '=', $data['code_name'])->get();

         # validator
        $validator = $this->_validator($data);

        # return error if there are errors
        if($validator->fails())
        {
            return $this->_setResponse(['message' => $validator->messages()->first()], 500);
        }
        else
        {
            # convert to array
            $badError_array = $badError->toArray();

            # update
            if( !empty($badError_array) && (isset($badError_array[0]) && !empty($badError_array[0])) )
            {
                $getBadErrorData = BadDataErrorModel::find($badError_array[0]['id']);
                $getBadErrorData->dex_en_name = $data['name_english'];
                $getBadErrorData->dex_ar_name = $data['name_japanese'];
                $getBadErrorData->dex_en_description = $data['description_english'];
                $getBadErrorData->dex_ar_description = $data['description_japanese'];
                $getBadErrorData->dex_code = $data['code_name'];
                $getBadErrorData->category = $data['category'];
                # save now
                $getBadErrorData->save();
                # push to data record
                $this->_data[$index] = $getBadErrorData;
                # save options
                if(isset($data['printdata_errors_option_link']) && !empty($data['printdata_errors_option_link']))
                {
                    $this->_storeOptions($index, $data['printdata_errors_option_link'], $getBadErrorData);
                }
            }
            # save
            else
            {
                $newBadError = new BadDataErrorModel;
                $newBadError->dex_en_name = $data['name_english'];
                $newBadError->dex_ar_name = $data['name_japanese'];
                $newBadError->dex_en_description = $data['description_english'];
                $newBadError->dex_ar_description = $data['description_japanese'];
                $newBadError->dex_code = $data['code_name'];
                $newBadError->category = $data['category'];
                # save now
                $newBadError->save();
                # push to data record
                $this->_data[$index] = $newBadError;
                # save options
                if(isset($data['printdata_errors_option_link']) && !empty($data['printdata_errors_option_link']))
                {
                    $this->_storeOptions($index, $data['printdata_errors_option_link'], $newBadError);
                }
            }
        }
    }

    /**
     * Store each record to the database (type options)
     *
     * @param integer
     * @param array
     * @param 'App\Models\BadDataErrors' Model
     * @return void
     */
    private function _storeOptions($index, $BadErrorOptions, $badError) 
    {
        # get BadError Data
        $badErrorData = BadDataErrorModel::find($badError->id);
        $options = [];

        foreach($BadErrorOptions as $i => $option)
        {
            # check if $option['printdata_error_options'] has data
            if( isset($option['printdata_error_options']) && !empty($option['printdata_error_options']) )
            {
                $error_option_data = $option['printdata_error_options'];
                # check if bad error option exist
                $optionData = BadDataErrorOptionModel::badDataErrorId($badError->id)
                    ->dexCode($error_option_data['code_name'])
                    ->get()
                    ->toArray();

                # update
                if( !empty($optionData) && (isset($optionData[0]) && !empty($optionData[0])) )
                {
                    $getBadErrorOptionData = BadDataErrorOptionModel::find($optionData[0]['id']);
                    $getBadErrorOptionData->dex_code = $error_option_data['code_name'];
                    $getBadErrorOptionData->dex_en_name = $error_option_data['name_english'];
                    $getBadErrorOptionData->dex_ar_name = $error_option_data['name_japanese'];
                    # push $getBadErrorOptionData object to options
                    $options[] = $getBadErrorOptionData;
                }
                # save
                else
                {
                    $newBadErrorOption = new BadDataErrorOptionModel;
                    $newBadErrorOption->dex_code = $error_option_data['code_name'];
                    $newBadErrorOption->dex_en_name = $error_option_data['name_english'];
                    $newBadErrorOption->dex_ar_name = $error_option_data['name_japanese'];
                    # push $newBadErrorOption object to options
                    $options[] = $newBadErrorOption;
                }
            }
        }

        # commit everything to database
        $this->_data[$index]['printdata_errors_option_link'] = $badErrorData
            ->options()
            ->saveMany($options);
    }
}
