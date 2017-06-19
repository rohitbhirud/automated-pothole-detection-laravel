<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
	/**
	 * The attributes that are mass assignable.
	 * 
	 * @var array
	 */
	protected $fillable = [
		'title', 'type', 'description', 'latitude', 'longitude',
		'imagename', 'user_id', 'status', 'comment'
	];

	/**
	 * Get a user for current complaint
	 * 
	 * @return A User
	 */
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
