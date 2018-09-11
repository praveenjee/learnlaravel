<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Use App\Models\User;
Use App\Models\Post;

Route::namespace('Front')->group(function () {	
	Route::get('/', 'HomeController@index')->name('home'); 
	Route::get('search', 'PostController@search')->name('search'); 
	Route::post('newsletter', 'HomeController@subscribenewsletter')->name('newsletter');
	Route::get('featured-post', 'HomeController@featuredpost')->name('featured');
	Route::get('author-detail.html', 'PageController@authordetail')->name('authordetail');
	Route::get('{slug?}'.'.html', 'PageController@index')->name('page');
	Route::get('contact', 'ContactController@create')->name('contact.create');
	Route::post('contact', 'ContactController@store')->name('contact.store'); 

	Route::get('category/{catslug?}', 'CategoryController@index')->name('category');
	Route::get('post/{slug?}', 'PostController@index')->name('post'); 
	
	Route::post('post/{slug}/comments', 'CommentsController@store')->name('post.comments.store');  
	Route::post('comment/replies', 'CommentRepliesController@store')
		->name('comment.replies.store'); 
	
	Route::get('mydashboard', 'DashboardController@show')->name('dashboard.show'); 	
	Route::get('post/tag/{tagid}', 'PostController@tag')->name('posttag'); 		
});



// Authentification
Auth::routes();


/*
// Created By: Praveen
// Created On: 28 July 2018
// Here i'm doing some lessons from udemy videos:START

//Accessing intermediate table /pivot

Route:: get('user/pivot', function(){
	$user = User::find(1);
	//return $user->roles; 

	foreach($user->roles as $role){
		//echo $role->pivot;
		//echo $role->created_at;
		echo $role->pivot->created_at;
	}
});

//One to Many relation
Route:: get('user/{id}/post', function($id){
	$user = User::find($id);
	//return $user->posts;
	foreach($user->posts as $post){
		echo $post->title ."<br>";
	}
});

//Inverse of One to Many relation
Route::get('post/{id}/user', function($id){
	$post = Post::find($id);
	return $post->user->name;
});

//One to Many relation
Route::get('createpost', function(){
	$user = User::findOrFail(1);
	$postdata = [
		'title' => 'My first post with Edwin Diaz',
		'seo-title' => 'my-first-post-with-edwin-diaz',
		'excerpt' => 'My first post with Edwin Diaz',
		'body'=> 'My first post with Edwin Diaz', 
		'meta_description'=> 'My first post with Edwin Diaz',
		'meta_keywords'=> 'my, first, post, with, Edwin, Diaz'
	];
	$post = new Post($postdata);
	$user->posts()->save($post);
});

Route::get('read', function(){
	$user = User::findOrFail(1);

	return $user->posts;
	//dd($user->posts);
});

/*
| END
*/


/*
|--------------------------------------------------------------------------
| Backend
|--------------------------------------------------------------------------|
*/
Route::prefix('admin')->namespace('Back')->group(function () {
	Route::middleware('admin')->group(function () {
		//admin home
		Route::name('admin')->get('/', 'AdminController@index');
		
        Route::resource('categories', 'CategoryController');
		Route::resource('users', 'UserController'); 
		Route::resource('posts', 'PostController');
		Route::resource('pages', 'PageController');
        Route::resource('contacts', 'ContactController', ['only' => ['index', 'destroy']]); 
		
		Route::resource('comments', 'CommentsController');
		Route::resource('comment/replies', 'CommentRepliesController');

        Route::name('settings.edit')
        	->get('settings', 'AdminController@settingsEdit');
        Route::name('settings.update')
        	->put('settings', 'AdminController@settingsUpdate');
        Route::view('medias', 'back.medias')->name('medias.index');
	});
}); 

