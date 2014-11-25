<?php
namespace App\Controllers\Control\Resource\Users;

use App\Controllers\Control as Control;
// Model
use App\Models\Groups as Groups;

class Backends extends Control {

	/**
	 * Display a listing of the resource.
	 * GET /resource/users/backends
	 *
	 * @return Response
	 */
	public function index()
	{
		return \User::getAdministrators();
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /resource/users/backends
	 *
	 * @return Response
	 */
	public function store()
	{
		$result = \DB::transaction(function()
		{
			# set data
			$data = [
				'email' => $this->_inputs['email'],
				'activated' => \User::ACTIVATED,
				'last_name' => $this->_inputs['last_name'],
				'first_name' => $this->_inputs['first_name'],
				'password' => \User::DEFAULT_PASSWORD_BACKEND
			];
			
			# validation
			$validator = $this->_validator($data);

			if($validator->fails())
			{
				return $this->_setResponse([
				    'message' => $validator->messages()->first()
				], 500);
			}
			else
			{
				# create user now
				$user = \Sentry::createUser($data, false);
				# add user group
				$user->addGroup(Groups::getAdministratorGroup());
				# get groups
				$user['group'] = \User::getCurrentGroups($user->id);
				return $user;
			}
		});

		return $result;
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /resource/users/backends/{id}
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
				# Find the user using the user id
			    $user = \Sentry::findUserById($inputs['id']);

			    # remove all group associated to the current user
			    if( !empty($inputs['group']) )
			    {
			    	foreach($inputs['group'] as $group)
			    	{
			    		# get group data
			    		$groupData = \Sentry::findGroupById($group['group_id']);
			    		# remove it from the user
			    		if($groupData->name != Groups::ADMINISTRATOR)
			    		{
			    			$user->removeGroup($groupData);	
			    		}
			    		
			    	}
			    }

			    # add new groups and check if its an array of groups
			    if( isset($inputs['groups']) && (is_array($inputs['groups']) && !empty($inputs['groups'])) )
			    {
			    	foreach($inputs['groups'] as $group)
			    	{
			    		# get group data
			    		$groupData = \Sentry::findGroupById($group);
			    		$user->addGroup($groupData);
			    	}
			    }
			    # if only one data
			    else if( isset($inputs['groups']) && !is_array($inputs['groups']) && $inputs['groups'] )
			    {
			    	# get group data
			    		$groupData = \Sentry::findGroupById($inputs['groups']);
			    		$user->addGroup($groupData);
			    }

			    # update user data
			    $user->email = $inputs['email'];
			    $user->first_name = $inputs['first_name'];
			    $user->last_name = $inputs['last_name'];
			    # save user now
			    $user->save();
			    # return updated data
			    return \User::getUser($user->id);
			}
		}

		 # return error if there are errors
        return $this->_setResponse(
            ['message' => 'Bad Data Error Data must not empty.']
        , 500);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /resource/users/backends/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		# get user data
		$user = \Sentry::findUserById($id);
		# look for the group affiliated
		$adminGroup = Groups::getAdministratorGroup();
		# remove user group affiliated
		if($user->removeGroup($adminGroup))
		{
			# remove user now
			$user->delete();	
		}
		
		return $user;
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
			'email' => ['required','email'],
			'first_name' => ['required'],
			'last_name' => ['required'],
		];

		# validator
		return $validator = \Validator::make($data, $rules);
	}

}