<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cord;

use App\Work;

class CordsCarController extends Controller
{
    public function saveCordCar(Request $request)
    {
    	//dd($request);

    	foreach ($request['cords'] as $key => $row) {

    		//dd($row);
    		Cord::create([
			    'id_car' 	=> $key,
			    'lat'		=> $row['lat'],
			    'lng'		=> $row['lng'],
			    'id_status'	=> 1
			]);
    	}
    }

    public function getCordsCars()
    {
    	//$rows = Cord::whereBetween('created_at', [now()->subSeconds(30), now()])->get();

    	//dd($rows);

		 $rows = Work::all();

    	if ($rows) {

			return response()->json([
				'result' => true,
				'data'	=> $rows
			],200);

    	}

    }

    public function saveCorsCordCar(Request $request)
    {
        //dd($request);

            //dd($row);
           $res = Cord::create([
                'id_car'    => intval($request['id_car']),
                'lat'       => $request['lat'],
                'lng'       => $request['lng'],
                'id_status' => 1
            ]);

           return response()->json(['result' => true]);
    }
}
