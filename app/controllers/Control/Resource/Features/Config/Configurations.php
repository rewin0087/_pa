<?php
namespace App\Controllers\Control\Resource\Features\Config;

use App\Controllers\Control as Control;
// models
use App\Models\Configurations as ConfigurationModel;

class Configurations extends Control {

    /**
     * Display a listing of the resource.
     * GET /resource/features/config/configurations
     *
     * @return Response
     */
    public function index()
    {
        return ConfigurationModel::all();
    }

    /**
     * Store a newly created resource in storage.
     * POST /resource/features/config/configurations
     *
     * @return Response
     */
    public function store()
    {
        return $this->_save();
    }

    /**
     * Update the specified resource in storage.
     * PUT /resource/features/config/configurations/{id}
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
     * DELETE /resource/features/config/configurations{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $configuration = ConfigurationModel::find($id);
        $configuration->delete();

        return $configuration;
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
            'key' => ['required'],
            'value' => ['required']
        ];

        # validator
        return \Validator::make($data, $rules);
    }

    /**
    * Save | Update
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
                $configuration = null;

                # do update
                if($update)
                {
                    $configuration = ConfigurationModel::find($id);
                }

                # do create new
                else
                {
                    $configuration = new ConfigurationModel;
                }

                $configuration->fill($this->_inputs);
                # save now
                $configuration->save();
                # return saved data
                return $configuration;
            }
        }

        # return error if there are errors
        return $this->_setResponse([
            'message' => 'Configuration must not empty.'
        ], 500);
    }

}