<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
	const ADMIN_ROLE = 'Administrator';
	const DEFAULT_ROLE = 'User';
	
	//const CREATED_AT = 'creation_date';
    //const UPDATED_AT = 'last_update';
	//protected $dateFormat = 'U';
	//public $timestamps = false;
	//protected $table = 'my_flights';
	//protected $connection = 'connection-name';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'role'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	public function isAdmin() {        
		return $this->role === self::ADMIN_ROLE;    
	}
	
	public function isAdmin_NOTUSED() {
		$isAdmin = false;
		$isAdmin = !$this->roles->filter(function($item) {
			return $item->name == 'Administrator';
		})->isEmpty();
		return $isAdmin;
	}
	
	public function hasRole($role = null){
		$hasRole = false;
		$hasRole = !$this->roles->filter(function($item) {
			return $item->name == $role;
		})->isEmpty();
		return $hasRole;
	}
	
	/**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function posts()	{
		//return $this->hasMany('App\Models\Post');
		return $this->hasMany(Post::class);
	} 
	
	/**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

	public function roles(){
		return $this->belongsToMany('App\Models\Role')->withPivot('created_at');
		//return $this->belongsToMany(Role::class);
	}

	public function getGravatarAttribute()
	{
		$userEmail = $this->attributes['email'];
		//$userEmail = "praveenk@clovity.com";
		$size = 100;
		//$default = \URL::to('/') . "images/blog/blog-author1.jpg";
		//$default = "http://myblog.localhost.com/images/blog/blog-author1.jpg";
		$default = "http://www.sitecompany.com/word/wp-content/uploads/2013/08/gravatar-logo-1024x1024.jpg";
		$hash = md5(strtolower(trim($userEmail)));
		
		return "https://s.gravatar.com/avatar/" . $hash . "?d=" . urlencode( $default ) . "&s=" . $size; 			
	} 

	public function get_gravatar( $email, $s = 80, $d = 'mp', $r = 'g', $img = false, $atts = array() ) 
	{
	    $url = 'https://www.gravatar.com/avatar/';
	    $url .= md5( strtolower( trim( $email ) ) );
	    $url .= "?s=$s&d=$d&r=$r";
	    if ( $img ) {
	        $url = '<img src="' . $url . '"';
	        foreach ( $atts as $key => $val )
	            $url .= ' ' . $key . '="' . $val . '"';
	        $url .= ' />';
	    }
	    return $url;
	}
	
}
