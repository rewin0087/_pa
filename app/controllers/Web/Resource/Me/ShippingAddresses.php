<?php
namespace App\Controllers\Web\Resource\Me;

use App\Controllers\Web as Web;
// models
use App\Models\UserAddress as AddressModel;

class ShippingAddresses extends Web {

    /**
     * Display a listing of the resource.
     * GET /resource/features/config/configurations
     *
     * @return Response
     */
    public function index()
    {
        return AddressModel::whereUserId(\Sentry::getUser()->id)
            ->where('type', '=', 2)
            ->orWhere(function($query)
            {
                $query->where('name', '=', 'main')
                      ->where('user_id', '=', \Sentry::getUser()->id);
            })
            ->get();
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
        $address = AddressModel::find($id);;
        if ($address->name == 'main')
        {
             return $this->_setResponse([
                'message' => 'Cannot delete this address.'
            ], 500);
        }
        $address = AddressModel::find($id);
        $address->delete();
        
        return $address;
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
            'receiving_first_name' => ['required'],
            'receiving_last_name' => ['required'],
            'company_name' => ['required'],
            'telephone_number' => ['required'],
            'mobile_number' => ['required'],
            'country' => ['required'],
            'city' => ['required'],
            'area' => ['required'],
            'street' => ['required'],
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
                $adress = null;

                # do update
                if($update)
                {
                    $adress = AddressModel::find($id);
                }

                # do create new
                else
                {
                    $adress = new AddressModel;
                }

                $adress->fill($this->_inputs);
                $type_of_address = $this->_inputs['type_of_address'];
                if ($type_of_address==1)
                {
                    $adress->is_primary = 1;
                    $adress->is_corporate = 0;
                }
                else
                {
                    $adress->is_corporate = 1;
                    $adress->is_primary = 0;
                }
                # save now
                $adress->save();
                # return saved data
                return $adress;
            }
        }

        # return error if there are errors
        return $this->_setResponse([
            'message' => 'Address must not be empty.'
        ], 500);
    }

}