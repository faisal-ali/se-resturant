<?php

class DailyIntakeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$orders = Order::select('created_at', DB::raw('sum(total_price) as total'))->groupBy('created_at')->orderBy('created_at','DESC')->get();
		$daily_intake = new ArrayObject();
		//echo $orders;
		$t = 0;
		$ca = '';
		foreach($orders as $order){
			if ($ca != $order->created_at) {
				if($t != 0){
					$daily_intake->append(array($ca, $t));
					$t = 0;	
				}
				$ca = $order->created_at;
			}
			$t = $t + $order->total;
		}
		$daily_intake->append(array($ca, $t));
		var_dump($daily_intake);
		return View::make('daily_intake.index')->with(array('orders' => $daily_intake));
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
		//
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
