<?php

class MenuController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$items = Menu::all();
		return View::make('menu.menu')->with(array('items'=> $items));
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
		$menu = new Menu;
		$menu->code = Input::get('code');
		$menu->name = Input::get('name');
		$menu->description = Input::get('description');
		$menu->price = Input::get('price');
		$menu->save();
		return Redirect::route('menu.index');
		
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$item = Menu::find($id);
		return View::make('menu.edit')->with(array('item'=> $item));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$item = Menu::find($id);
		$item->code = Input::get('code');
		$item->name = Input::get('name');
		$item->description = Input::get('description');
		$item->price = Input::get('price');
		$item->save();
		return Redirect::to(url("/menu"));
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$item = Menu::destroy($id);
        return Redirect::to(url("/menu"));
	}


}
