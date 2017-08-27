<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Complaint;
use App\User;

class ApiController extends Controller
{

	protected $success = ['status' => 'true'];
	protected $fail = ['status' => 'false'];

	public function getComplaints()
	{
		$user_id = request('user_id');

		return User::find( $user_id )->complaints();
	}

    public function jurkCreate()
    {
    	$complain = new Complaint;

    	$complain->title = request('title');
    	$complain->latitude = request('latitude');
    	$complain->longitude = request('longitude');
    	$complain->user_id = (int)request('user_id');

    	$complain->save();

    	return $this->success;
    }

    public function login()
    {
    	$user = User::where('email', request('email')
    				->where('password', \Hash::make( request('password') ))
    				)->count();

    	if ( $user == 1 ) {
    		return $this->success;
    	} else {
    		return $this->fail;
    	}
    }

    public function register()
    {
    	$user = new User;

    	$user->username = request('username');
    	$user->email = request('email');
    	$user->mobile = request('mobile');
    	$user->adharno = request('adharno');
    	$user->password = \Hash::make( request('password') );

    	$user->save();

    	return $this->success;
    }

    public function makeComplaint(Request $request)
    {
    	$complain = new Complaint;

    	$complain->type = $request->input('type');
    	$complain->title = $request->input('title');
    	$complain->description = $request->input('description');
    	$complain->latitude = $request->input('latitude');
    	$complain->longitude = $request->input('longitude');
    	$complain->user_id = (int)$request->input('user_id');

    	if ( $request->file('image')->isValid() ) {

    		$path = $request->image->store('uploads');
    		
    		$complain->imagepath = $path;

	    	$complain->save();

	    	return $this->success;    			
    	}

    	return $this->fail;

    }

    public function makeVoiceComplain()
    {
    	$complain = new Complaint;

    	$complain->type = $request->input('type');
    	$complain->title = $request->input('title');
    	$complain->description = $request->input('description');
    	$complain->latitude = $request->input('latitude');
    	$complain->longitude = $request->input('longitude');
    	$complain->user_id = (int)$request->input('user_id');

    	return $this->success;
    }
}
