<?php
namespace App\Controllers\Control\Resource\Users;

use App\Controllers\Control as Control;
// Model
use App\Models\Groups as Groups;
use App\Models\UserInfo as UserInfo;
use App\Models\UserAddress as UserAddress;

class Customers extends Control {

	protected $layout = NULL;
	/**
	 * Display a listing of the resource.
	 * GET /resource/users/customers
	 *
	 * @return Response
	 */
	public function index()
	{
		return \User::getCustomers();
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /resource/users/customers
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
				'password' => \User::DEFAULT_PASSWORD_CUSTOMER
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

				$address = new UserAddress;
				$address->user_id = $user->id;
				$address->name = 'main';
				$address->type = 0;
                $address->is_primary = 1;
				$address->receiving_first_name = $this->_inputs['first_name'];
				$address->receiving_last_name = $this->_inputs['last_name']; 
				$address->save();

				$info = new UserInfo;
				$info->user_id = $user->id;
				$info->first_name = $this->_inputs['first_name'];
				$info->last_name = $this->_inputs['last_name'];
				$info->save();

				return $user;
			}
		});

		return $result;
	}
	
}