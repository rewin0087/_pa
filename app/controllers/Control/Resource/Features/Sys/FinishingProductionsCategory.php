<?php
namespace App\Controllers\Control\Resource\Features\Sys;

use App\Controllers\Control as Control;
// model
use App\Models\FinishingProductionsCategory as FinishingProductionsCategoryModel;

class FinishingProductionsCategory extends Control {

	/**
	 * Display a listing of the resource.
	 * GET /resource/features/sys/paper-finishing-types
	 *
	 * @return Response
	 */
	public function index()
	{
		# return all
		return FinishingProductionsCategoryModel::all();
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
				$finishingProductionsCategory = FinishingProductionsCategoryModel::find($inputs['id']);
				$finishingProductionsCategory->en_name = $inputs['en_name'];
				$finishingProductionsCategory->ar_name = $inputs['ar_name'];
                $finishingProductionsCategory->code_name = $inputs['code_name'];
				# save now
				$finishingProductionsCategory->save();
				# return updated data
				return $finishingProductionsCategory;
			}
		}

		 # return error if there are errors
        return $this->_setResponse([
            'message' => 'Finishing production category Data must not empty.'
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
            'en_name' => ['required'],
            'ar_name' => ['required']
        ];

        # validator
        return \Validator::make($data, $rules);
    }

}