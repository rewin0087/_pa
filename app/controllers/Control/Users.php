<?php
namespace App\Controllers\Control;

use App\Controllers\Control as Control;
// Model
use App\Models\Groups as Groups;

class Users extends Control {

	/**
	* Users/group Page
	*
	*/
	public function group () 
	{
		// set template
		$this->_template = \View::make('control.users.group');
		// render page
		$this->_appendTitle(' | Group')
			->_setClass('group-page')
			->_renderPage();
	}

	/**
	* Users/customers Page
	*
	*/
	public function customers () 
	{
		// set template
		$this->_template = \View::make('control.users.customers');
		// render page
		$this->_appendTitle(' | Customers')
			->_setClass('customer-page')
			->_renderPage();
	}

	/**
	* Users/back-end Page
	*
	*/
	public function backEnd () 
	{
		// set template
		$this->_template = \View::make('control.users.back-end');
		// render page
		$this->_appendTitle(' | BackEnd')
			->_setClass('backend-page')
			->_renderPage();
	}

	/**
	* Users/access-controls Page
	*
	*/
	public function accessControls ()
	{

	}
}