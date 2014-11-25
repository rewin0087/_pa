<?php
namespace App\Controllers\Control\Features;

use App\Controllers\Control as Control;

class Dex extends Control  {
	
	/**
	* dex/paper-colors  Page
	*
	*/
	public function paperColors () 
	{
		// set template
		$this->_template = \View::make('control.features.dex.paper-colors');
		// render page 
		$this->_appendTitle(' | Dex - Paper Colors')
			->_setClass('dex-paper-colors-page')
			->_renderPage();
	}
	
	/**
	* dex/paper-sizes  Page
	*
	*/
	public function paperSizes () 
	{
		// set template
		$this->_template = \View::make('control.features.dex.paper-sizes');
		// render page
		$this->_appendTitle(' | Dex - Paper Sizes')
			->_setClass('dex-paper-sizes-page')
			->_renderPage();
	}
	
	/**
	* dex/paper-finishing-types  Page
	*
	*/
	public function paperFinishingTypes () 
	{
		// set template
		$this->_template = \View::make('control.features.dex.paper-finishing-types');
		// render page
		$this->_appendTitle(' | Dex - Paper Finishing Types')
			->_setClass('dex-paper-finishing-types-page')
			->_renderPage();
	}

	/**
	* dex/bad-data-errors  Page
	*
	*/
	public function badDataErrors () 
	{
		// set template
		$this->_template = \View::make('control.features.dex.bad-data-errors');
		// render page
		$this->_appendTitle(' | Dex - Bad Data Errors')
			->_setClass('dex-bad-data-errors-page')
			->_renderPage();
	}
}