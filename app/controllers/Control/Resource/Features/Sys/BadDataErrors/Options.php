<?php
namespace App\Controllers\Control\Resource\Features\Sys\BadDataErrors;

use App\Controllers\Control as Control;
// model
use App\Models\BadDataErrorOptions as BadDataErrorOptionModel;

class Options extends Control {

    protected $layout = NULL;

    /**
     * Display a listing of the resource.
     * GET /resource/features/sys/bad-data-errors/options
     *
     * @return Response
     */
    public function index()
    {
        if( !empty($this->_inputs) && (isset($this->_inputs['bad_data_error']) && $this->_inputs['bad_data_error']) )
        {
            # get options with bad_data_error_id
            return BadDataErrorOptionModel::badDataErrorId($this->_inputs['bad_data_error'])
                ->get();
        }

        # return error if there are errors
        return $this->_setResponse([
            'message' => 'Invalid Access Bad Data Error Id not found.'
        ], 500);
    }

    /**
     * Update the specified resource in storage.
     * PUT /resource/features/sys/baddataerrors/options/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $inputs = $this->_inputs;

        # check if there's a data pass
        if( !empty($inputs) )
        {
            # validator
            $validator = $this->_validator($inputs);

            # return error if there are errors
            if($validator->fails())
            {
                return $this->_setResponse([
                    'message' => $validator->messages()->first()
                ], 500);
            }

            # do update
            else
            {
                $badDataErrorOption = BadDataErrorOptionModel::find($inputs['id']);
                $badDataErrorOption->en_name = $inputs['en_name'];
                $badDataErrorOption->ar_name = $inputs['ar_name'];
                # save now
                $badDataErrorOption->save();
                # return updated data
                return $badDataErrorOption;
            }
        }

         # return error if there are errors
        return $this->_setResponse([
            'message' => 'Bad Data Error Option Data must not empty.'
        ], 500);
    }

    /**
     * Validation
     *
     * @param array
     * @return object
     */
    private function _validator($data) 
    {
        # set rules
        $rules = [
            'dex_code' => ['required'],
            'en_name' => ['required'],
            'ar_name' => ['required'],
            'dex_ar_name' => ['required'],
            'dex_en_name' => ['required']
        ];

        # validator
        return \Validator::make($data, $rules);
    }
}