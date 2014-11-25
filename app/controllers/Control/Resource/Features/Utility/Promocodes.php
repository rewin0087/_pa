<?php
namespace App\Controllers\Control\Resource\Features\Utility;

use App\Controllers\Control as Control;
// models
use App\Models\Promocodes as PromocodeModel;

class Promocodes extends Control {

    /**
     * Display a listing of the resource.
     * GET /resource/features/utility/promocodes
     *
     * @return Response
     */
    public function index() {
        //
        return PromocodeModel::with('promocodeUsedIn')->get();
    }

    /**
     * Store a newly created resource in storage.
     * POST /resource/features/utility/promocodes/
     *
     * @return Response
     */
    public function store() {
        //

        return $this->_save();
    }

    /**
     * Update the specified resource in storage.
     * PUT /resource/features/utility/promocodes/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
        return $this->_save(true);
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /resource/features/utility/promocodes/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) 
    {
        //
       
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
            'type' => ['required'],
            'discount' => ['required'],
        ];

        # PERIOD_DISCOUNT_TYPE
        if( isset($data['type']) && $data['type'] == PromocodeModel::PERIOD_DISCOUNT_TYPE )
        {
            $rules['date_from'] = ['required'];
            $rules['date_to'] = ['required'];
        }

        # SUBMISSION_TIME_DISCOUNT_TYPE
        if( isset($data['type']) && $data['type'] == PromocodeModel::SUBMISSION_TIME_DISCOUNT_TYPE )
        {
            $rules['time_from'] = ['required'];
            $rules['time_to'] = ['required'];
        }

        # if id isset check enabled parameter
        if( isset($data['id']) && $data['id'] )
        {
            $rules['enabled'] = ['required'];
        }

        # DISCOUNT_BY_PERCENT_TOTAL_SALES
        if( isset($data['discount']) && $data['discount'] == PromocodeModel::DISCOUNT_BY_PERCENT_TOTAL_SALES )
        {
            $rules['percent'] = ['required'];
        }

        # DISCOUNT_BY_AMOUNT
        if( isset($data['discount']) && $data['discount'] == PromocodeModel::DISCOUNT_BY_AMOUNT )
        {
            $rules['amount'] = ['required'];
        }

        # validator
        return \Validator::make($data, $rules);
    }

    /**
    * Save | Update
    *
    */
    private function _save($update = false)
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
                $promocode = null;

                # do update
                if($update)
                {
                    $promocode = PromocodeModel::find($inputs['id']);
                    $promocode->enabled = $inputs['enabled'];
                }

                # do create new
                else
                {
                    $promocode = new PromocodeModel;
                    $promocode->enabled = PromocodeModel::ENABLE;
                    # generate code
                    $code = $promocode->generateCode();

                    $promocode->code = $code;
                }

                $promocode->fill($this->_inputs);

                # SUBMISSION_TIME_DISCOUNT_TYPE
                if( $inputs['type'] == PromocodeModel::SUBMISSION_TIME_DISCOUNT_TYPE )
                {
                    $promocode->time_from = $inputs['time_from'];
                    $promocode->time_to = $inputs['time_to'];
                }

                # PERIOD_DISCOUNT_TYPE
                else if( $inputs['type'] == PromocodeModel::PERIOD_DISCOUNT_TYPE )
                {
                    $promocode->date_from = $inputs['date_from'];
                    $promocode->date_to = $inputs['date_to'];
                }

                # DISCOUNT_BY_PERCENT_TOTAL_SALES
                if( $inputs['discount'] == PromocodeModel::DISCOUNT_BY_PERCENT_TOTAL_SALES )
                {
                    $promocode->percent = $inputs['percent'];
                }

                # DISCOUNT_BY_AMOUNT
                else if( $inputs['discount'] == PromocodeModel::DISCOUNT_BY_AMOUNT )
                {
                    $promocode->amount = $inputs['amount'];
                }

                # save now
                $promocode->save();
                # return saved data
                $promocode->load('promocodeUsedIn');
                return $promocode;
            }
        }

        # return error if there are errors
        return $this->_setResponse([
            'message' => 'Promcode must not empty.'
        ], 500);
    }
}
