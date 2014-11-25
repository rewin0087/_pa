<?php
namespace App\Controllers\Web\Resource\Me;

use App\Controllers\Web as Web;

class Emails extends Web {

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
            'email' => ['required','email']
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
                    $email = \User::find($id);
                }

                # do create new
                else
                {
                    $email = new \User;
                }

                $email->fill($this->_inputs);
                # save now
                $email->save();
                # return saved data
                return $email;
            }
        }

        # return error if there are errors
        return $this->_setResponse([
            'message' => 'Email must not be empty.'
        ], 500);
    }
}