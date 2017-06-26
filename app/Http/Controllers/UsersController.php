<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function index()
    {
    	$users = User::where('role', 'citizen')->get();

    	$title = "All Registered Users";

    	return view('users.index', compact('users', 'title'));
    }

    public function complaints(User $user)
    {
    	$complaints = $user->complaints;

    	$title = $user->fullname . "'s Reported Complaints";

    	return view('users.complaints', compact('complaints', 'title'));
    }

    public function destroy(User $user)
    {
    	$user->complaints()->delete();

    	$user->delete();

    	return back();
    }
}
