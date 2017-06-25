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
        //
    }

    /**
     * Store a newly created engineer in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        User::destroy($id);

        Complaint::where('engineer_id', $id)
            ->update(['engineer_id' => 0]);

        return back();
    }
}
