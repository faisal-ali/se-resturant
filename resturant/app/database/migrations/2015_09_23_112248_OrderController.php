<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderController extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order',
		function($table)
		{
			$table->increments('id');
			$table->integer('customer_id');
			$table->foreign('customer_id')->references('id')->on('customers');
			$table->integer('menu_id');
			$table->foreign('menu_id')->references('id')->on('menus');
			$table->integer('price');
			$table->string('type');
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
		//
	}

}
