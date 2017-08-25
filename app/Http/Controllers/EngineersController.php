<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{User, Complaint, Helpers\Helper};

class EngineersController extends Controller
{

    private $helper;

    function __construct(Helper $helper)
    {
        $this->helper = $helper;
    }

    /**
     * Display a listing of the engineer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $engineers = $this->helper->getAllEngineers();

        $title = "Available Engineers";

        return view('engineers.index', compact('engineers', 'title'));
    }

    /**
     * Show the form for creating a new engineer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add new engineer";

        return view('engineers.create', compact('title'));
    }

    /**
     * Store a newly created engineer in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;

        $user->username = $request->username;
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->password = \Hash::make( $request->password );
        $user->role = "engineer";
        $user->save();

        return redirect()->route('engineer.index');
    }

    /**
     * Display the specified engineer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified engineer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified engineer in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified engineer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete Current Engineer
        User::destroy($id);

        // Unassign deleted engineer from complaints assigned
        Complaint::where('engineer_id', $id)
            ->update(['engineer_id' => 0]);

        // Delete complaints if reported by engineer
        // this is temporary as engineer cant report
        Complaint::where('user_id', $id)
            ->delete();

        return back();
    }

    public function complaints(User $engineer)
    {
        $complaints = $this->helper->getAssignedComplaints( $engineer->id );

        $title = "Engineer " . $engineer->fullname . "'s Assigned Complaints";

        return view('engineers.complaints', compact('complaints', 'title'));
    }
}
