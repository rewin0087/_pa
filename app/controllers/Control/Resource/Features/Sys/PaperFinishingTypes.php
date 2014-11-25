<?php
namespace App\Controllers\Control\Resource\Features\Sys;

use App\Controllers\Control as Control;
// model
use App\Models\PaperFinishingTypes as PaperFinishingTypeModel;

class PaperFinishingTypes extends Control {

	/**
	 * Display a listing of the resource.
	 * GET /resource/features/sys/paper-finishing-types
	 *
	 * @return Response
	 */
	public function index()
	{
		# return all
		return PaperFinishingTypeModel::all();
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /resource/features/sys/paperfinishingtypes/{id}
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
				$finishingType = PaperFinishingTypeModel::find($inputs['id']);
				$finishingType->en_name = $inputs['en_name'];
				$finishingType->ar_name = $inputs['ar_name'];
                $finishingType->dex_en_name = $inputs['dex_en_name'];
                $finishingType->dex_ar_name = $inputs['dex_ar_name'];
                $finishingType->dex_code = $inputs['dex_code'];
				# save now
				$finishingType->save();
				# return updated data
				return $finishingType;
			}
		}

		 # return error if there are errors
        return $this->_setResponse([
            'message' => 'Paper Finishing Type Data must not empty.'
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
            'dex_en_name' => ['required']
        ];

        # validator
        return \Validator::make($data, $rules);
    }

}