<?php

namespace App;
use DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','mobile','address','permissions',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	
	public function getproducts()
	{
		$query=DB::table('products')->get();
		return count($query); 
		
	}
	
	public function getpages()
	{
		$query=DB::table('cms')->get();
		return count($query); 
		
	}
	public function getclients()
	{
		$query=DB::table('clientslogo')->get();
		return count($query); 
		
	}
	
	public function getusers()
	{
		$query=DB::table('users')->get();
		return count($query); 
		
	}
	public function contactform()
	{
		$query=DB::table('contactform')->get(); 
		return count($query); 
		
	}
	public function toptenqn()
	{
		$query=DB::table('contactform')->orderBy('id','desc')->take(5)->get(); 
		return $query; 
		
	}
}
