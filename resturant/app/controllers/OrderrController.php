<?php

class OrderrController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('order.order');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$customer = Customer::find(Input::get('cust_id'));
		$itemList = Menu::lists('name','code');
		$orderType = [
			"delivery" => "Delivery",
			"takeaway" => "Take Away"
		];
		return View::make('order.create')->with(array('customer' => $customer, 'itemsList' => $itemList, 'orderType' => $orderType));
	}
	

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$items_name = $_POST['item_name'];
		$items_quantity = $_POST['item_quantity'];
		$items_price = $_POST['item_price'];
		$customer_id = $_POST['customer_id'];
		$delivery_type = $_POST['order_type'];
		$total_price = 0;
		for($i = 0; $i < count($items_quantity); $i++) {
			$total_price = $total_price + ($items_quantity[$i] * $items_price[$i]);
		}
		$order = new Order;
		$order->customer_id = $customer_id;
		$order->type = $delivery_type;
		$order->total_price = $total_price;
		$order->save();
		for($x = 0; $x < count($items_quantity); $x++) {
			$order_item = new OrderItem;
			$order_item->order_id = $order->id;
			$order_item->quantity = $items_quantity[$x];
			$item = Menu::where('name','=',$items_name[$x])->get();
			$order_item->menu_id = $item[0]->id;
			$order_item->save();
		}
		return Redirect::route('order.show', array($order->id));
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$order = Order::find($id);
		$order_items = OrderItem::where('order_id','=',$id)->get();
		$customer = $order->customer;
		return View::make('order.showitem')->with(array('order' => $order, 'order_items' => $order_items, 'customer' => $customer));
	}
	
	public function view()
	{
		$orders = Order::all();
		return View::make('order.view')->with(array('orders' => $orders));
	}
	
	public function process($id)
	{
		echo "inside process";
		$order = Order::find($id);
		$order->processed = 'true';
		$order->save();
		return Redirect::route('orderr.view');
		
	}
	
	/**
	 * Search for a customer in system.
	 *
	 * @return Response
	 */
	public function search()
	{
		$phone_number = Input::get('phone_number');
		$customer = Customer::where('phone_number' , '=', $phone_number)->first();
		echo $customer;
		if($customer != null) {
			echo "inside customer";
			return Redirect::route('order.create', array('cust_id' =>$customer->id));
		} else {
			echo "inside else";
			return View::make('customer.create');
		}
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
