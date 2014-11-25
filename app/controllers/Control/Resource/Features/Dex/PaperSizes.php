<?php
namespace App\Controllers\Control\Resource\Features\Dex;

use App\Controllers\Control as Control;
// model
use App\Models\PaperSizes as PaperSizeModel;

class PaperSizes extends Control {

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
        $sizes = $this->_inputs;
        # store definitions
        if(!empty($sizes) && ( isset($sizes[0]) && !empty($sizes[0]) ) ) 
        {
            foreach($sizes as $size)
            {
                 $this->_store($size);
            }
            # return updated data
            return $this->_data;
        }
        # return error if there are errors
        return $this->_setResponse([
            'message' => 'Collection of paper sizes must not empty.'
        ], 500);
    }

    /**
     * Store each record to the database
     *
     * @param array
     *
     * @return colleciton of object
     */
    private function _store($data) 
    {
        # check if code_name exist
        if(!isset($data['size_code']) && $data['size_code'])
        {
            return $this->_setResponse([
                'message' => 'Code Name Must not empty.'
            ], 500);
        }

        # get color if exist
        $size = PaperSizeModel::where('dex_code', '=', $data['size_code'])->get();
        
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
            $size_array = $size->toArray();

            # update
            if( !empty($size_array) && (isset($size_array[0]) && !empty($size_array[0])) )
            {
                $size = PaperSizeModel::find($size_array[0]['id']);
                $size->dex_en_name = $data['name_en'];
                $size->dex_ar_name = $data['name_jp'];
                $size->dex_code = $data['size_code'];
                # save now
                $size->save();
                # push to data the record
                $this->_data[] = $size;
            }
            # save
            else
            {
                $paperSize = new PaperSizeModel;
                $paperSize->dex_en_name = $data['name_en'];
                $paperSize->dex_ar_name = $data['name_jp'];
                $paperSize->dex_code = $data['size_code'];
                # save now
                $paperSize->save();
                # push to data the record
                $this->_data[] = $paperSize;
            }
        }
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
            'size_code' => ['required'],
            'name_en' => ['required'],
            'name_jp' => ['required']
        ];

        # validator
        return \Validator::make($data, $rules);
    }
}
