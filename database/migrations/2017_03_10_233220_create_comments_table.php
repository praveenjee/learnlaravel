<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentsTable extends Migration {

	public function up()
	{
		Schema::create('comments', function(Blueprint $table) {
			$table->increments('id');			
			$table->integer('post_id')->index();
			$table->string('author');
            $table->string('email')->index();
            $table->text('body');
			$table->string('photo')->nullable();
			$table->boolean('is_active')->default(false);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('comments');
	}
}
