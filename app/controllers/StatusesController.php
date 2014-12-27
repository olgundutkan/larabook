<?php

use Larabook\Forms\StatusForm;

use Larabook\Core\CommandBus;

class StatusesController extends \BaseController 
{
	use CommandBus;

	/**
	 * Status Form Validation
	 * @var array
	 */
	private $statusForm;

	/**
	 * constructor
	 * @param StatusForm $statusForm 
	 */
	public function __construct(StatusForm $statusForm)
	{
		$this->beforeFilter('guest');

		$this->statusForm = $statusForm;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('statuses.index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a new status.
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->execute(new PushStatusCommand(Input::get('body')));
	}


	/**
	 * Display the specified resource.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
