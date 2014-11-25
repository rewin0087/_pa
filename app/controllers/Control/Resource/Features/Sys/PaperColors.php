<?php
namespace App\Controllers\Control\Resource\Features\Sys;

use App\Controllers\Control as Control;
// model
use App\Models\PaperColors as PaperColorModel;

class PaperColors extends Control {

	/**
	 * Display a listing of the resource.
	 * GET /resource/features/sys/paper-colors
	 *
	 * @return Response
	 */
	public function index()
	{
		# return all
		return PaperColorModel::all();
		
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /resource/features/sys/papercolors/{id}
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
				$color = PaperColorModel::find($inputs['id']);
				$color->en_description = $inputs['en_description'];
				$color->ar_description = $inputs['ar_description'];
				$color->en_name = $inputs['en_name'];
				$color->ar_name = $inputs['ar_name'];
				# save now
				$color->save();
				# return updated data
				return $color;
			}
		}

		 # return error if there are errors
        return $this->_setResponse([
            'message' => 'Paper Color Data must not empty.'
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
            'ar_description' => ['required']
        ];

        # validator
        return \Validator::make($data, $rules);
    }

}