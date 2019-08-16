<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Team;
use App\Sprint;

class SprintsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $backlog_id = Team::find(Auth::user()->getCurrentTeamId())->backlog->id;
        $x = count( Team::find(Auth::user()->getCurrentTeamId())->backlog->sprints ) + 1 ;

        Sprint::create([
            'backlog_id'=>$backlog_id, 
            'sprint_no'=>$x, 
            'start_date'=>'2019-08-08 00:00:00', 
            'due_date'=>'2019-08-10 00:00:00'
            ]);

        return response()->json(['message'=>$backlog_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($sprintId)
    {
        $sprint = Sprint::find($sprintId);
        $this->authorize('deleteSprint', $sprint);
        Team::deleteSprint($sprintId);
        return response()->json(['message'=>$sprintId]);
    }
}
