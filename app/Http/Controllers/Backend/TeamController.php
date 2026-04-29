<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Team;
use Illuminate\Http\Request;
use DataTables;

class TeamController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.content.team.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(empty($request->title)){
            return response()->json('error', 200);
        }
        $team =new Team();
        $team->name =$request->name;
        $team->title =$request->title;
        $team->facebook =$request->facebook;
        $team->tweitter =$request->tweitter;
        $team->linkedin =$request->linkedin;
        $team->instagram =$request->instagram;
        $team->badge =$request->badge;
        $team->soc =$request->soc;
        $teamimage = $request->file('image');
        $name = time() . "_" . $teamimage->getClientOriginalName();
        $uploadPath = ('public/images/team/');
        $teamimage->move($uploadPath, $name);
        $teamimageImgUrl = $uploadPath . $name;
        $team->image = $teamimageImgUrl;
        $team->save();
        return response()->json($team, 200);
    }

    public function teamdata()
    {
        $teams = Team::all();
        return Datatables::of($teams)
            ->addColumn('action', function ($teams) {
                return '<a href="#" type="button" id="editTeamBtn" data-id="' . $teams->id . '"   class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editmainTeam" ><i class="bi bi-pencil-square"></i></a>
                <a href="#" type="button" id="deleteTeamBtn" data-id="' . $teams->id . '" class="btn btn-danger btn-sm" ><i class="bi bi-archive" ></i></a>';
            })

            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::findOrfail($id);
        return response()->json($team, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $team = Team::findOrfail($id);
        if(empty($request->title)){
            return response()->json('error', 200);
        }
        $team->name =$request->name;
        $team->title =$request->title;

        if(isset($request->instagram)){
            $team->instagram=$request->instagram;
        }else{
            $team->instagram=null;
        }
        if(isset($request->facebook)){
            $team->facebook=$request->facebook;
        }else{
            $team->facebook=null;
        }
        if(isset($request->tweitter)){
            $team->tweitter=$request->tweitter;
        }else{
            $team->tweitter=null;
        }
        if(isset($request->linkedin)){
            $team->linkedin=$request->linkedin;
        }else{
            $team->linkedin=null;
        }
        $team->badge=$request->badge;
        $team->soc=$request->soc;
        
        if($request->image){
            unlink($team->image);
            $image = $request->file('image');
            $name = time() . "_" . $image->getClientOriginalName();
            $uploadPath = ('public/images/team/');
            $image->move($uploadPath, $name);
            $imageImgUrl = $uploadPath . $name;
            $team->image = $imageImgUrl;
        }
        $team->update();
        return response()->json($team, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::findOrfail($id);
        $team->delete();
        return response()->json('success', 200);
    }

    public function statusupdate(Request $request)
    {
        $team = Team::where('id',$request->team_id)->first();
        $team->status=$request->status;
        $team->update();
        return response()->json($team, 200);
    }
}