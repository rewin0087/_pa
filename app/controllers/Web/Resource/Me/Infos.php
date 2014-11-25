<?php
namespace App\Controllers\Web\Resource\Me;

use App\Controllers\Web as Web;
// models
use App\Models\UserInfo as InfoModel;
use App\Models\UserAddress as AddressModel;

class Infos extends Web {

    /**
     * Display a listing of the resource.
     * GET /resource/features/config/configurations
     *
     * @return Response
     */
    public function index()
    {
       return \User::userId(\Sentry::getUser()->id)
            ->get()
            ->first()
            ->load('userAddress','userInfo');
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
        if( isset($this->_inputs['avatar']) )
        {
            // $inputs = array(
            //     'email' => \Input::get('email'),
            //     'password' => \Input::get('password'),
            // );
            // return $this->_login($inputs);
            return $this->_setResponse([
                'message' => 'Avatar'
            ], 500);
        }

        return $this->_save(true, $id);
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /resource/fclose(handle)eatures/config/configurations{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $info = InfoModel::find($id);
        $info->delete();

        return $info;
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
            'first_name'           => ['required'],
            'last_name'            => ['required'],
            'country'              => ['required'],
            'city'                 => ['required'],
            'area'                 => ['required'],
            'street'               => ['required'],
            'building_name'        => ['required'],
            'floor'                => ['required'],
            'apartment'            => ['required'],
            'telephone_number'     => ['required'],
            'mobile_number'        => ['required'],
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
                $user = \User::find($id);
                $info = InfoModel::find($id);
                $address = AddressModel::find($id);

                $info = $user->userInfo;
                $address = $user->userAddress;
                $info->fill($this->_inputs);
                $address->fill($this->_inputs);
                $user->first_name = $this->_inputs['first_name'];
                $user->last_name = $this->_inputs['last_name'];
                $address->receiving_first_name = $this->_inputs['first_name'];
                $address->receiving_last_name = $this->_inputs['last_name'];
                $user->save();
                $address->save();
                $info->save();
                
                return $user;
            }
        }

        # return error if there are errors
        return $this->_setResponse([
            'message' => 'Information must not be empty.'
        ], 500);
    }

    private function _avatar($inputs)
    {

    }
}