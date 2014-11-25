<?php
namespace App\Controllers\Web\Resource\Me;

use App\Controllers\Web as Web;

class Passwords extends Web {

    /**
     * Display a listing of the resource.
     * GET /resource/features/config/configurations
     *
     * @return Response
     */
    public function index()
    {
        return \User::where('id', '=', \Sentry::getUser()->id)->first();
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
     * Validation
     *
     * @param array
     * @return object
     */
    private function _validator($data) 
    {
        # set rules
        $rules = [
            'new_password' => ['required','between:8,60'],
            'confirm_password' => ['required','between:8,60']
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
        $current_password = $this->_inputs['current_password'];
        $new_password = $this->_inputs['new_password'];
        $confirm_password = $this->_inputs['confirm_password'];

        # check if there's a data pass
        if( !empty($inputs) )
        {
             # validator
            $validator = $this->_validator($inputs);

            $info = null;
            $email = \Sentry::getUser()->email;
            $user = \Sentry::findUserByCredentials( array( 'email' => $email ));
            if( $user->checkPassword($current_password))
            {
                    # return error if there are errors
                if($validator->fails())
                {
                    return $this->_setResponse([
                        'message' => $validator->messages()->first()
                    ], 500);
                }
                else
                {
                    if ($new_password == $confirm_password)
                    {
                        $user->password = $confirm_password;;
                        $user->save();
                        return $user;
                    }
                    else
                    {
                        return $this->_setResponse([
                            'message' => 'Confirm Password did not match.'
                        ], 500);
                    }
                }
            }
            else
            {
                return $this->_setResponse([
                        'message' => 'Wrong Password.'
                    ], 500);
            }
        }
    }
}