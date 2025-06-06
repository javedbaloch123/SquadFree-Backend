<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    public function index()
    {

       $team = Team::get();
        return$team;
    }


    public function store(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'profession' => 'required',
            'desc' => 'required',
            'image'=>'required'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => false,
                'error' => $validate->errors()
            ]);
        }

        $team = new Team();
        $team->name = $request->name;
        $team->profession = $request->profession;
        $team->desc = $request->desc;
       

        $team->save();

        return response()->json([
            'status' => true,
        ]);
    }

    public function edit($id)
    {

        $team = Team::find($id);
        return $team;
    }



    public function update(Request $request,$id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'profession' => 'required',
            'desc' => 'required',
            'image'=>'required'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => false,
                'error' => $validate->errors()
            ]);
        }

        $team = Team::find($id);
        $team->name = $request->name;
        $team->profession = $request->profession;
        $team->desc = $request->desc;

        $team->save();

        return response()->json([
            'status' => true,
        ]);
    }


    public function delete($id){
        $team = Team::find($id);
        $team->delete();
      return response()->json([
            'status' => true,
            'message'=>'data deleted'
        ]);
    }
}
