<?php
namespace App\Controllers\Control\Resource\Features\Config;

use App\Controllers\Control as Control;
// models
use App\Models\DeliveryCutoff as DeliveryCutoffModel;

class DeliveryCutoff extends Control {

    /**
     * Display a listing of the resource.
     * GET /resource/features/config/delivery-cut-off-time
     *
     * @return Response
     */
    public function index()
    {
        return DeliveryCutoffModel::all();
    }

    /**
     * Store a newly created resource in storage.
     * POST /resource/features/config/delivery-cut-off-time
     *
     * @return Response
     */
    public function store()
    {
        return $this->_save();
    }

    /**
     * Update the specified resource in storage.
     * PUT /resource/features/config/delivery-cut-off-time/{id}
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
     * DELETE /resource/features/config/delivery-cut-off-time/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $deliveryCutoff = DeliveryCutoffModel::find($id);
        $deliveryCutoff->delete();

        return $deliveryCutoff;
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
                $deliveryCutoff = null;
                # do update
                if($update)
                {
                    $deliveryCutoff = DeliveryCutoffModel::find($id);
                }

                # do create new
                else
                {
                    $deliveryCutoff = new DeliveryCutoffModel;
                }

                $deliveryCutoff->fill($this->_inputs);
                # save now
                $deliveryCutoff->save();
                # return saved data
                return $deliveryCutoff;
            }
        }

        # return error if there are errors
        return $this->_setResponse([
            'message' => 'Delivery Cut Off Time must not empty.'
        ], 500);
    }

}