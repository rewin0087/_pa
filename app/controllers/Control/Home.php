<?php
namespace App\Controllers\Control;

use App\Controllers\Control as Control;

class Home extends Control {

	/**
	 * Display a listing of the resource.
	 * GET /control/home
	 *
	 * @return Response
	 */
	public function index() {
		//
		$this -> _template = \View::make('control.home.index');

		$this -> _renderPage();
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /control/home/create
	 *
	 * @return Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /control/home
	 *
	 * @return Response
	 */
	public function store() {
		//
	}

	/**
	 * Display the specified resource.
	 * GET /control/home/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /control/home/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /control/home/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /control/home/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

}
