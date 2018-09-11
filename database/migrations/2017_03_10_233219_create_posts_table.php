<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index();
			$table->string('photo_id')->unsigned()->index();			
			$table->string('title',150);
			$table->string('seo_url', 150)->unique();
			$table->text('excerpt');
			$table->text('body');
			$table->string('meta_title', 200);
			$table->text('meta_keyword');
			$table->text('meta_description');
			$table->boolean('status')->default(false);	
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('posts');
	}
}
