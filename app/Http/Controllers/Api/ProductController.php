<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {

       $product = Project::get();
        return $product;
    }


    public function store(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'client' => 'required',
            'desc' => 'required',
            'deliever_date'=>'required',
            'start_date'=>'required',
            'image'=>'required'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => false,
                'error' => $validate->errors()
            ]);
        }

        $product = new Project();
        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->client = $request->client;
        $product->start_date = $request->start_date;
        $product->deliever_date = $request->deliever_date;
       

        $product->save();

        return response()->json([
            'status' => true,
        ]);
    }

    public function edit($id)
    {

        $product = Project::find($id);
        return $product;
    }



    public function update(Request $request,$id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'client' => 'required',
            'desc' => 'required',
            'deliever_date'=>'required',
            'start_date'=>'required',
            'image'=>'required'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => false,
                'error' => $validate->errors()
            ]);
        }

        $product = Project::find($id);
        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->client = $request->client;
        $product->start_date = $request->start_date;
        $product->deliever_date = $request->deliever_date;

        $product->save();

        return response()->json([
            'status' => true,
        ]);
    }


    public function delete($id){
        $product = Project::find($id);
        $product->delete();
      return response()->json([
            'status' => true,
            'message'=>'data deleted'
        ]);
    }
}

