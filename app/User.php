<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'username', 'fullname', 'email', 'mobile',
        'adharno', 'password', 'role', 'complaint_id',
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
     * Get all complaint by current user.
     * 
     * @return A Complaint
     */
    public function complaints()
    {
        return $this->hasMany('App\Complaint');
    }

    public function hasRole($role)
    {
        return ( $this->role == $role ? true : false );
    }
}
