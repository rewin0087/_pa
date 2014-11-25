<?php
namespace App\Controllers\Web;
use App\Controllers\Web as Web;
use App\Models\Groups as Groups;
class Home extends Web {

	/**
	 * Display a listing of the resource.
	 * GET /web/home
	 *
	 * @return Response
	 */
	public function index()
	{
        $this->_template = \View::make('web.home.index');
        $this->_setClass('printarabia-home')
                ->_renderPage();         
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /web/home/home/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /web/home/home
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /web/home/home/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /web/home/home/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /web/home/home/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /web/home/home/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
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
        $this->_appendTitle(' | Login')
            ->_setClass('login')
            ->_renderPage();
    }
}