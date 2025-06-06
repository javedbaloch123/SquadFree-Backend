<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function index()
    {

        $services = Service::get();
        return $services;
    }


    public function store(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'subtitle' => 'required',
            'desc' => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => false,
                'error' => $validate->errors()
            ]);
        }

        $service = new Service();
        $service->name = $request->name;
        $service->subtitle = $request->subtitle;
        $service->desc = $request->desc;

        $service->save();

        return response()->json([
            'status' => true,
        ]);
    }

    public function edit($id)
    {

        $service = Service::find($id);
        return $service;
    }



    public function update(Request $request,$id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'subtitle' => 'required',
            'desc' => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => false,
                'error' => $validate->errors()
            ]);
        }

        $service = Service::find($id);
        $service->name = $request->name;
        $service->subtitle = $request->subtitle;
        $service->desc = $request->desc;

        $service->save();

        return response()->json([
            'status' => true,
        ]);
    }


    public function delete($id){
        $service = Service::find($id);
        $service->delete();
      return response()->json([
            'status' => true,
            'message'=>'data deleted'
        ]);
    }
}
