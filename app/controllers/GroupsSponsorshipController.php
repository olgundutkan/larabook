<?php

use Larabook\Sponsorships\Sponsorship;

class GroupsSponsorshipController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$sponsorship = Sponsorship::all();

		return View::make('frontend::pages.groups_sponsorship.index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('frontend::pages.groups_sponsorship.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Flash::overlay('Group sponsorship created.');

		return Redirect::route('groups-sponsorship.index');
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
		$sponsorship = Sponsorship::findOrFail($id);

		return View::make('frontend::pages.groups_sponsorship.edit');
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$sponsorship = Sponsorship::findOrFail($id);

		Flash::overlay('Group sponsorship created.');

		return Redirect::route('groups-sponsorship.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$sponsorship = Sponsorship::findOrFail($id);

		$sponsorship->delete();
		
		Flash::overlay('Group sponsorship created.');

		return Redirect::route('groups-sponsorship.index');
	}


}
