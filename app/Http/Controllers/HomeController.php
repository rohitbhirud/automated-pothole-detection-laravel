<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Complaint;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( Auth::user()->hasRole('engineer') ) {
            return redirect('mod/');
        }

        $counter['potholes'] = Complaint::where('type', 'pothole')->count();
        $counter['traffic'] = Complaint::where('type', 'traffic')->count();
        $counter['accidents'] = Complaint::where('type', 'accident')->count();
        $counter['users'] = User::count();
        $cords = json_encode( Complaint::with('user')->latest()->limit(10)->get() );

        $title = "Pothole Detection Dashboard";
        
        return view('home', compact('title', 'counter', 'cords'));
    }

    public function reports($type = "")
    {
        if ( $type == '' ) {
            
            $title = "View Complaint Reports";
            
            return view('reports', compact('title'));

        } elseif ( in_array( $type, array('traffic', 'accident', 'pothole') ) ) {

            $complaints = Complaint::where( 'type', $type )->get();

            $title = "This Month's " . ucfirst( $type ) . "Complaints";
            
            return view('reportslog', compact('complaints', 'title'));
        }
    }
}
