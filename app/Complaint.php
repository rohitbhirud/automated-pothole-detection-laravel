<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

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

    public function engineer()
    {
    	if ( $this->isAssigned() )
    		return $this->belongsTo('App\User', 'engineer_id');

    	return false;
    }

    /**
     * Get a user for current complaint
     * 
     * @return A User
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function isAssigned()
    {
    	if ( $this->engineer_id != 0 ) 
    		return true;

    	return false;
    }

}
