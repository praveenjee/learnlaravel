<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTagsTable extends Migration {

	public function up()
	{
		Schema::create('tags', function(Blueprint $table) {
			$table->increments('id');
			$table->string('tag')->unique();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('tags');
	}
}
