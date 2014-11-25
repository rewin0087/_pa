<?php
namespace App\Controllers\Control\Resource\Users;

use App\Controllers\Control as Control;
// Model
use App\Models\Groups as Groups;

class Group extends Control {

	protected $layout = NULL;

	/**
	 * Display a listing of the resource.
	 * GET /resource/users/group
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		return Groups::all();
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /resource/users/group
	 *
	 * @return Response
	 */
	public function store()
	{
		# save $group now
		try
		{
			$group = \Sentry::createGroup($this->_inputs);
		}
		catch (Cartalyst\Sentry\Groups\NameRequiredException $e)
		{
		    return $this->_response(
		        ['message' => 'Name field is required']
		    , 500);
		}
		catch (Cartalyst\Sentry\Groups\GroupExistsException $e)
		{
		    return $this->_response(
		        ['message' => 'Group already exists']
		    , 500);
		}

		return Groups::find($group->id);;
	}

	/**
	 * Display the specified resource.
	 * GET /resource/users/group/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Groups::find($id);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /resource/users/group/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		try
		{
			# Find the group using the group id
	    	$group = \Sentry::findGroupById($id);

	    	$group->name = $this->_inputs['name'];
	    	# Update the group
		    if ($group->save())
		    {
		        return Groups::find($id);
		    }
		    else
		    {
		        return $this->_response(
		            ['message' => 'Failed to update.']
		        , 500);
		    }
		}
		catch (Cartalyst\Sentry\Groups\NameRequiredException $e)
		{
		    return $this->_response(
		        ['message' => 'Name field is required.']
		    , 500);
		}
		catch (Cartalyst\Sentry\Groups\GroupExistsException $e)
		{
		     return $this->_response(
		        ['message' => 'Group already exists.']
		     , 500);
		}
		catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
		{
		    return $this->_response(
		        ['message' => 'Group was not found.']
		    , 500);
		}

	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /resource/users/group/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$group = NULL;
		
		try
		{
		    # Find the group using the group id
		    $group = \Sentry::findGroupById($id);

		    # Delete the group
		    $group->delete();
		}
		catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
		{
		    return $this->_response(['message' => 'Group was not found.'], 500);
		}

		return $group;
	}

}