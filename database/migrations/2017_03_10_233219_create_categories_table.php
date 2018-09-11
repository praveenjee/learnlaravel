<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration {

	public function up()
	{
		Schema::create('categories', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title', 150)->unique();
			$table->string('slug', 150)->unique();
		});
	}

	public function down()
	{
		Schema::drop('categories');
	}
}
