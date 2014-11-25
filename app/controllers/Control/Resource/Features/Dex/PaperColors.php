<?php
namespace App\Controllers\Control\Resource\Features\Dex;

use App\Controllers\Control as Control;
// model
use App\Models\PaperColors as PaperColorModel;

class PaperColors extends Control {

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
        $colors  = $this->_inputs;
        # store definitions
        if(!empty($colors) && ( isset($colors[0]) && !empty($colors[0]) ) ) 
        {
            foreach($colors as $color)
            {
                 $this->_store($color);
            }
            # return updated data
            return $this->_data;
        }
        # return error if there are errors
        return $this->_setResponse([
            'message' => 'Collection of paper colors must not empty.'
        ], 500);
    }

    /**
     * Store each record to the database
     *
     * @param array
     *
     * @return void
     */
    private function _store($data) 
    {
        # check if code_name exist
        if(!isset($data['color_code']) && $data['color_code'])
        {
            return $this->_setResponse([
                'message' => 'Code Name Must not empty.'
            ], 500);
        }

        # get color if exist
        $color = PaperColorModel::where('dex_code', '=', $data['color_code'])->get();
        
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
            $color_array = $color->toArray();

            # update
            if( !empty($color_array) && (isset($color_array[0]) && !empty($color_array[0])) )
            {
                $color = PaperColorModel::find($color_array[0]['id']);
                $color->dex_en_name = $data['name_en'];
                $color->dex_ar_name = $data['name_jp'];
                $color->dex_code = $data['color_code'];
                # save now
                $color->save();
                # push to data record
                $this->_data[] = $color;
            }
            # save
            else
            {
                $paperColor = new PaperColorModel;
                $paperColor->dex_en_name = $data['name_en'];
                $paperColor->dex_ar_name = $data['name_jp'];
                $paperColor->dex_code = $data['color_code'];
                # save now
                $paperColor->save();
                # push to data record
                $this->_data[] = $paperColor;
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
            'color_code' => ['required'],
            'name_en' => ['required'],
            'name_jp' => ['required']
        ];

        # validator
        return \Validator::make($data, $rules);
    }
}
