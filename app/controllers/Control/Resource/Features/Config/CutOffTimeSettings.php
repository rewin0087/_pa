<?php
namespace App\Controllers\Control\Resource\Features\Config;

use App\Controllers\Control as Control;
// models
use App\Models\CutoffTime as CutoffTimeModel;

class CutOffTimeSettings extends Control {

	/**
	 * Display a listing of the resource.
	 * GET /resource/features/config/cutofftimesettings
	 *
	 * @return Response
	 */
	public function index()
	{
		return CutoffTimeModel::all();
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /resource/features/config/cutofftimesettings
	 *
	 * @return Response
	 */
	public function store()
	{
		return $this->_save();
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /resource/features/config/cutofftimesettings/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		return $this->_save(true, $id);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /resource/features/config/cutofftimesettings/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$cutOffTimeSetting = CutoffTimeModel::find($id);
		$cutOffTimeSetting->delete();

		return $cutOffTimeSetting;
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
            'label' => ['required'],
            'value' => ['required']
        ];

        # validator
        return \Validator::make($data, $rules);
    }

    /**
    *
    *
    */
    private function _save($update = false, $id = NULL)
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

            # save 
            else
            {
            	$cutOffTimeSetting = null;
            	# do update
            	if($update)
            	{
            		$cutOffTimeSetting = CutoffTimeModel::find($id);
            	}

            	# do create new
            	else
            	{
            		$cutOffTimeSetting = new CutoffTimeModel;
            	}

            	$cutOffTimeSetting->fill($this->_inputs);
            	# save now
            	$cutOffTimeSetting->save();
            	# return saved data
            	return $cutOffTimeSetting;
            }
		}

		# return error if there are errors
        return $this->_setResponse([
            'message' => 'Cut Off Time Setting must not empty.'
        ], 500);
    }

}