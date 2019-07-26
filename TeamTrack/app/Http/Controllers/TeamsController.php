<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Team;
use App\User; 

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show teams where user is Leader

        //show teams where user is Member
        //return User::find(Auth::id())->teams;
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function masterindex()
    {
        $teams = Team::all();
        return view('teams.index')->with('teams',$teams);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return 'createfun';
        return view('teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required'
        ]);
        //add new Team
        Team::create(['name' => $request->input('name'), 'leader_id'=>Auth::id() ]);
        //add this user in team_user table

        return redirect ('/teams');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = Team::find($id);
        return view('teams.show')->with('team',$team);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // addMember() loads the view and storeMember() stores the data to DB
    public function addMember($id)
    {        
       $team = Team::find($id);
       return view('teams.addMember')->with('team',$team);
    }

    public function storeMember(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'team_id'=>'required'
        ]);

        //TODO : add access control, check if Team belongs to this user
        User::addUserToTeamByEmail($request->input('email'), $request->input('team_id') );

        return redirect ('/teams');
    }

    public function removeMember($id)
    {

    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
