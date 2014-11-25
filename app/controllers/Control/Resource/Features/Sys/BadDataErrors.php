<?php
namespace App\Controllers\Control\Resource\Features\Sys;

use App\Controllers\Control as Control;
// model
use App\Models\BadDataErrors as BadDataErrorModel;

class BadDataErrors extends Control {

	/**
	 * Display a listing of the resource.
	 * GET /resource/features/sys/bad-data-errors
	 *
	 * @return Response
	 */
	public function index()
	{
		# return all
		return BadDataErrorModel::all();
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /resource/features/sys/baddataerrors/{id}
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
				$badDataError = BadDataErrorModel::find($inputs['id']);
				$badDataError->en_description = $inputs['en_description'];
				$badDataError->ar_description = $inputs['ar_description'];
				$badDataError->en_name = $inputs['en_name'];
				$badDataError->ar_name = $inputs['ar_name'];
				# save now
				$badDataError->save();
				# return updated data
				return $badDataError;
			}
		}

		 # return error if there are errors
        return $this->_setResponse([
            'message' => 'Bad Data Error Data must not empty.'
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
            'dex_code' => ['required'],
            'en_name' => ['required'],
            'ar_name' => ['required'],
            'dex_ar_name' => ['required'],
            'dex_en_name' => ['required'],
            'en_description' => ['required'],
            'ar_description' => ['required'],
            'dex_en_description' => ['required'],
            'dex_ar_description' => ['required']
        ];

        # validator
        return \Validator::make($data, $rules);
    }
}