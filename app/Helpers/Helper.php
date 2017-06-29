<?php

namespace App\Helpers;

use App\{User, Complaint};

/**
* Helper functions class
*/
class Helper
{

	public function getAllEngineers()
	{
		return User::with(['complaints' => function ($query)
	        {
	            $query->count();

	        }])->where('role', 'engineer')->get();
	}

	public function getAssignedComplaints($engineer_id)
	{
		return Complaint::where('engineer_id', $engineer_id)->get();
	}

	public function getClosedComplaints($engineer_id)
	{
		return Complaint::where('engineer_id', $engineer_id)->where('status', 'closed')->get();
	}

	public function getAssignedComplaintsCount($engineer_id)
	{
		return Complaint::where('engineer_id', $engineer_id)->count();
	}
}	
