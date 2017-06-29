<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Helpers\Helper;
use App\{User, Complaint};

class ModsController extends Controller
{

	private $helper;

	function __construct(Helper $helper)
	{
		$this->helper = $helper;
	}

    public function index()
    {
        $counter['potholes'] = Complaint::where('type', 'pothole')->count();
        $counter['traffic'] = Complaint::where('type', 'traffic')->count();
        $counter['accidents'] = Complaint::where('type', 'accident')->count();
        $counter['users'] = User::count();

        $title = "Pothole Detection Dashboard";
        
        return view('home', compact('title', 'counter'));
    }

    public function complaints()
    {
    	$complaints = $this->helper->getAssignedComplaints( Auth::id() );

        $title = "Engineer " . Auth::user()->fullname . "'s Assigned Complaints";

        return view('mods.index', compact('complaints', 'title'));
    }

    public function closed()
    {
        $complaints = $this->helper->getClosedComplaints( Auth::id() );

        $title = "Engineer " . Auth::user()->fullname . "'s Assigned Complaints";

        return view('mods.index', compact('complaints', 'title'));
    }

    public function details(Complaint $complaint)
    {
    	$title = "Complaint Details";

    	return view('mods.details', compact('complaint', 'title'));
    }

    public function update(Request $request, $id)
    {
        $complaint = Complaint::find($id);

        $complaint->status = $request->status;

        $complaint->comment = $request->comment;

        $complaint->save();

        return back();
    }
}
