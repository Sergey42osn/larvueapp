<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

use App\Http\Requests\RegisterFormRequest;

class RegisterController extends Controller
{
    public function register(RegisterFormRequest $request)
	{
		//dd($request);

	    $user=User::create([
	        'name' => request('name'),
	        'f_name' => request('f_name'),
	        'email' => request('email'),
	        'password' => bcrypt(request('password'))
	    ]);

	   	//event(new Registered($user));

	    $user->sendEmailVerificationNotification();

	    return response()->json(['status' => 201,'result' => true]);
	}
}
