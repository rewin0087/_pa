<?php
namespace App\Controllers\Web\Resource\Users;

use App\Controllers\Web as Web;
// Model
use App\Models\Groups as Groups;
use App\Models\User as UserModel;
use App\Models\UserInfo as InfoModel;
use App\Models\UserAddress as AddressModel;

class Customers extends Web {

    protected $layout = NULL;
    /**
     * Display a listing of the resource.
     * GET /resource/users/customers
     *
     * @return Response
     */
    public function index()
    {
        return \User::all();

    }

    /**
     * Store a newly created resource in storage.
     * POST /resource/users/customers
     *
     * @return Response
     */
    public function store()
    {
        if( isset($this->_inputs['login']) )
        {
            $inputs = array(
                'email' => \Input::get('email'),
                'password' => \Input::get('password'),
            );

            return $this->_login($inputs);
        }

        if( isset($this->_inputs['register']) )
        {
            return $this->_register();
        }
    }

    public function update($id)
    {
        return $this->_save(true, $id);
    }

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
                $user = null;

                # do update
                if($update)
                {
                    $user = UserModel::find($id);
                }

                # do create new
                else
                {
                    $user = new UserModel;
                }

                $user->fill($this->_inputs);
                # save now
                $user->save();
                # return saved data
                return $user;
            }
        }

        # return error if there are errors
        return $this->_setResponse([
            'message' => 'Information must not be empty.'
        ], 500);
    }

    private function _login($inputs)
    {
        try{
            $user = \Sentry::authenticate($inputs, false);
            if($user)
            {
                return $user;
            }
        }
        catch (\Exception $e)
        {
            return $this->_setResponse([
                'message' => 'Wrong Username/Password.'
            ], 500);
        }
    }

    private function _register()
    {
        $result = \DB::transaction(function()
        {
            # set data
            $data = [
                'first_name' => $this->_inputs['first_name'],
                'last_name' => $this->_inputs['last_name'],
                'email' => $this->_inputs['email'],
                'activated' => \User::ACTIVATED,
                'password' => $this->_inputs['password'],
                'confirm_password' => $this->_inputs['confirm_password'],
                'terms_condition' => isset($this->_inputs['terms_condition']) ? $this->_inputs['terms_condition'] : ''
            ];
            # set rules
            $rules = [
                'first_name' => ['required'],
                'last_name' => ['required'],
                'email' => ['required','email'],
                'password' => ['required'],
                'confirm_password' => ['required'],
                'terms_condition' => ['required']
            ];
            # validator
            $validator = \Validator::make($data, $rules);

            if($validator->fails())
            {
                return $this->_setResponse(['message' => $validator->messages()->first()], 500);
            }
            else
            {
                $password = $this->_inputs['password'];
                $confirm_password = $this->_inputs['confirm_password'];
                if($password != $confirm_password)
                {
                    return $this->_setResponse(['message' => 'Password did not match'], 500);
                }
                else
                {
                    unset($data['confirm_password']);
                    unset($data['terms_condition']);
                    
                    $user = \Sentry::createUser($data, false);        
                    $user->addGroup(Groups::getCustomerGroup());
            
                    $credentials = array(
                        'email' => $this->_inputs['email'],
                        'password' => $this->_inputs['password'],
                    );

                    $login = \Sentry::authenticate($credentials, false);
                    $info = new InfoModel;
                    $info->user_id = \Sentry::getUser()->id;
                    $info->fill($this->_inputs);
                    $info->save();

                    $address = new AddressModel;
                    $address->user_id = \Sentry::getUser()->id;
                    $address->name = 'main';
                    $address->type = 0;
                    $address->is_primary = 1;
                    $address->receiving_first_name = $this->_inputs['first_name'];
                    $address->receiving_last_name = $this->_inputs['last_name'];
                    $address->fill($this->_inputs);
                    $address->save();
                    
                    return $user;
                // // return \Redirect::to('/me/info')->withErrors(array('profile' => 'Please complete your profile.'));
                }
            }
        });

        return $result;
    }

    public function getLogin()
    {
        // set template
        $this->_template = \View::make('web.auth.login');
        // render page
        $this->_appendTitle(' | Login')
            ->_setClass('login')
            ->_renderPage();
    }

    public function getRegister()
    {
        // set template
        $this->_template = \View::make('web.auth.register');
        // render page
        $this->_appendTitle(' | Register')
            ->_setClass('register')
            ->_renderPage();
    }



    public function postLogin()
    {   
        $credentials = array(
                'email' => \Input::get('email'),
                'password' => \Input::get('password'),
            );
        try{
            $user = \Sentry::authenticate($credentials, false);
            if($user)
            {
                return \Redirect::to('/me/info');
            }
        }
        catch (\Exception $e)
        {
            // return \Redirect::to('login')->withErrors(array('login' => 'Error!'));
            return $this->_setResponse([
                'message' => 'Wrong Username/Password.'
            ], 500);
        }
    }

    public function postRegister()
    {
        $result = \DB::transaction(function()
        {
            # set data
            $data = [
                'email' => $this->_inputs['email'],
                'activated' => \User::ACTIVATED,
                'last_name' => $this->_inputs['last_name'],
                'first_name' => $this->_inputs['first_name'],
                'password' => $this->_inputs['password'],
            ];
            # set rules
            $rules = [
                'email' => ['required','email'],
                'first_name' => ['required'],
                'last_name' => ['required'],
            ];
            # validator
            $validator = \Validator::make($data, $rules);

            if($validator->fails())
            {
                return $this->_setResponse(['message' => $validator->messages()->first()], 500);
            }
            else
            {
                # create user now
                $user = \Sentry::createUser($data, false);
                # add user group
                $user->addGroup(Groups::getCustomerGroup());

                $credentials = array(
                    'email' => $this->_inputs['email'],
                    'password' => $this->_inputs['password'],
                );

                $login = \Sentry::authenticate($credentials, false);
                
                $info = new InfoModel;
                $info->user_id = \Sentry::getUser()->id;
                $info->fill($this->_inputs);
                $info->save();

                $address = new AddressModel;
                $address->user_id = \Sentry::getUser()->id;
                $address->name = 'main';
                $address->type = 1;
                $address->is_primary = 1;
                $address->receiving_first_name = $this->_inputs['first_name'];
                $address->receiving_last_name = $this->_inputs['last_name'];
                $address->fill($this->_inputs);
                $address->save();
                
                return \Redirect::to('/me/info')->withErrors(array('profile' => 'Please complete your profile.'));
            }
        });

        return $result;
    }

    public function logout()
    {
        \Sentry::logout();
        return \Redirect::to('/');
    }

    public function getCurrentUser()
    {
        $current_user = \Sentry::getUser()->id;
        // get users
        return \Sentry::findUserById($current_user);
    }
    
}