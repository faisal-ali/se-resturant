<?php

class CustomerController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$customers = Customer::all();
		return View::make('customer.customer')->with(array('customers'=> $customers));
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
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$number = Input::get('phone_number');
		$customer = Customer::where('phone_number' , '=', $number)->first();
		if ($customer != null) {
			$error = "customer with the same phone number already exists";
			return View::make('customer.create')->with(array('error' => $error));
		} else {
			$customer = new Customer;
			$customer->name = Input::get('name');
			$customer->phone_number = Input::get('phone_number');
			$customer->address = Input::get('address');
			$customer->cc_number = Input::get('cc_number');
			$customer->save();
			echo $customer;
			return Redirect::route('order.create', array('cust_id' =>$customer->id));
		}
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
		$customer = Customer::find($id);
		return View::make('customer.edit')->with(array('customer'=> $customer));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$customer = Customer::find($id);
		$customer->name = Input::get('name');
		$customer->phone_number = Input::get('phone_number');
		$customer->address = Input::get('address');
		$customer->cc_number = Input::get('cc_number');
		$customer->save();
		return Redirect::to(url("/customer"));
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$customer = Customer::destroy($id);
        return Redirect::to(url("/customer"));
	}


}
