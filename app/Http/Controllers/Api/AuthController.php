<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
     public function Authentication(){
         if(Auth::user()){
              return response()->json([
                'status'=>true,
                'user'=>'authenticated'
              ]);
         }else{
            return response()->json([
                'status'=>false,
                'user'=>'not authenticated'
              ]);
         }
     }
}
