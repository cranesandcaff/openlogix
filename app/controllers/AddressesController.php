<?php

class AddressesController extends \BaseController {

	/**
	 * Display a listing of addresses
	 *
	 * @return Response
	 */
	public function index()
	{
		$addresses = Address::all();

		return Response::json($addresses);
	}

	/**
	 * Show the form for creating a new address
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('addresses.create');
	}

	/**
	 * Store a newly created address in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Address::$rules);

		if ($validator->fails())
		{
			return Response::json(array('type' => 'error', 'message' => 'Error storing parking spot'), 500);
		}

		$address = Address::create($data);

		return Response::json($address);
	}

	/**
	 * Display the specified address.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$address = Address::findOrFail($id);

		return Response::json($address);
	}

	/**
	 * Show the form for editing the specified address.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$address = Address::find($id);

		return View::make('addresses.edit', compact('address'));
	}

	/**
	 * Update the specified address in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$address = Address::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Address::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$address->update($data);

		return Redirect::route('addresses.index');
	}

	/**
	 * Remove the specified address from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Address::destroy($id);

		return Redirect::route('addresses.index');
	}

}
