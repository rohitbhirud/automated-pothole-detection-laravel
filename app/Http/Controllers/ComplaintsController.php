<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{ User, Complaint};

class ComplaintsController extends Controller
{

	public function index($type)
	{
		$complaints = Complaint::where('type', $type)->get();

		$title = ucfirst($type) . " Complaints";

		return view('complaints.index', compact('complaints', 'title'));
	}

    public function show(Complaint $complaint)
    {
    	$engineers = User::getAllEngineers();

    	$title = "Complaint Details";

    	return view('complaints.details', compact('complaint', 'engineers', 'title'));
    }
}
