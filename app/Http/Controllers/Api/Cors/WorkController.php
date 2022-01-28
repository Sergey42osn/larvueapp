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

   public function create(Request $request){

     /* return response()->json([
         'user' => $request['user']['id_car']
     ], 200);*/

      if($request['user']){
        // $res_decode = json_decode($request['user']);

         $res = Work::create([
            'id_car' 	=> $request['user']['id_car'],
            'phone'     => $request['user']['phone'],
            'name'     => $request['user']['name'],
				'status'	   => 1
         ]);

         $data = [
            'result'    => true,
            'data'      => $res,
            'user'      => $request['user']
         ];

      }else{
         $data = [
            'result'    => false,
            'data'      => $res,
            'user'      => $request['user']
         ];

      }

      /*if($request->user){
         Work::create([
            'id_car' 	=> $request->id_car,
				'lat'		   => $request->latitude,
				'lng'		   => $request->longitude,
				'status'	   => $request->status
         ]);
      }*/

      return response()->json($data, 200);
   }
}