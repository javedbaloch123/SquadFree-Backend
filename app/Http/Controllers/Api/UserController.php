<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function store(Request $request){

            $validate = Validator::make($request->all(),[
                'name'=> 'required',
                'email'=>'required|email|unique:users',
                'password'=>'required|min:6',
                
            ]);

            if($validate->fails()){
                return response()->json([
                    'status'=>false,
                    'error'=>$validate->errors()
                ]);
            }

            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;

            $user->save();

            return response()->json([
                    'status'=>true, 
                ]);
    }


  public function login(Request $request){
    
            $validate = Validator::make($request->all(),[
                'email'=>'required|email',
                'password'=>'required|min:6',
                
            ]);

            if($validate->fails()){
                return response()->json([
                    'status'=>false,
                    'error'=>$validate->errors()
                ]);
            }

            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                  
                 return response()->json([
                    'status'=>true,
                    'message'=>'authenticated'
                ]);
            }else{
                 return response()->json([
                    'status'=>'invalid',
                  
                ]);
            }
  }

}
