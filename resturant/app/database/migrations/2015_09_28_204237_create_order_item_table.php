<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_items',
		function($table)
		{
			$table->increments('id');
			$table->integer('order_id');
			$table->foreign('order_id')->references('id')->on('order');
			$table->integer('menu_id');
			$table->foreign('menu_id')->references('id')->on('menus');
			$table->integer('price');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_items');
	}

}
