<?php

namespace App\Http\Controllers\Api\Cors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Work;

class WorkController extends Controller
{
   public function index(){
      return response()->json([
         'message' => 'Неправильный логин или пароьль',
         'errors' => 'No auth'
     ], 200);
   }

   public function creat(Request $request){

      if($request->status){
         Work::create([
            'id_car' 	=> $request->id_car,
				'lat'		   => $request->latitude,
				'lng'		   => $request->longitude,
				'status'	   => $request->status
         ]);
      }

      return response()->json([
         'result' => true,
         'message' => 'Неправильный логин или пароьль',
         'data' => 'creat'
     ], 200);
   }
}