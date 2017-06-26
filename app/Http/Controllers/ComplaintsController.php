<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{ User, Complaint, Helpers\Helper};

class ComplaintsController extends Controller
{

	private $helper;

	function __construct(Helper $helper)
	{
		$this->helper = $helper;
	}

	public function index($type)
	{
		$complaints = Complaint::where('type', $type)->get();

		$title = ucfirst($type) . " Complaints";

		return view('complaints.index', compact('complaints', 'title'));
	}

    public function show(Complaint $complaint)
    {
    	$engineers = $this->helper->getAllEngineers();

    	$title = "Complaint Details";

    	return view('complaints.details', compact('complaint', 'engineers', 'title'));
    }

    public function assign(Complaint $complaint)
    {
    	$complaint->engineer_id = request()->engineer_id;

    	$complaint->save();

    	return back();
    }

    public function destroy(Complaint $complaint)
    {
        $complaint->delete();

        return back();
    }
}
