<?php
namespace App\Controllers\Web\Resource\Me;

use App\Controllers\Web as Web;
// models
use App\Models\UserAddress as AddressModel;

class SenderAddresses extends Web {

    /**
     * Display a listing of the resource.
     * GET /resource/features/config/configurations
     *
     * @return Response
     */
    public function index()
    {
        return AddressModel::whereUserId(\Sentry::getUser()->id)
            ->where('type', '=', 1)
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
            'postal_code1' => ['required','alpha_num','size:4'],
            'postal_code2' => ['required','alpha_num','size:4'],
            'address' => ['required','between:8,60'],
            'telephone_number' => ['required'],
            'receiving_first_name' => ['required'],
            'receiving_last_name' => ['required'],
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
                $info = null;

                # do update
                if($update)
                {
                    $info = AddressModel::find($id);
                }

                # do create new
                else
                {
                    $info = new AddressModel;
                }

                $info->fill($this->_inputs);
                # save now
                $info->save();
                # return saved data
                return $info;
            }
        }

        # return error if there are errors
        return $this->_setResponse([
            'message' => 'Address must not be empty.'
        ], 500);
    }

}