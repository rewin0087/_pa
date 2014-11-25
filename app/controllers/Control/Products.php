<?php
namespace App\Controllers\Control;

use App\Controllers\Control as Control;
// model
use App\Models\PrintProducts as PrintProductModel;

class Products extends Control {

	/**
	 * products/printing Page
	 *
	 * @return Response
	 */
	public function printing()
	{
		// set template
		$this->_template = \View::make('control.products.printing');
		// render page 
		$this->_appendTitle(' | Products - Print')
			->_setClass('products-printing-page')
			->_renderPage();
	}

}