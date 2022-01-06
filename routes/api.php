<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/email','Api\EmailController\@email');

Route::group(['prefix' => '/v1','namespace' => 'Api','middleware' => ['api'], 'as' => 'api.'], function () {

  	Route::post('/register', 'RegisterController@register');
	Route::post('/login', 'LoginController@login');

	Route::get('/email/verify/{id}/{hash}','VerificationController@verify')->name('verification.verify');

	//Route::get('/email/verify','VerificationController@verify')->name('email-verify');
	Route::get('/email/verify/check','VerificationController@check');

	Route::post('/email/resend','VerificationController@resend');

	Route::post('cors/login', 'CorsController@cors');   

	Route::post('/logout', 'LoginController@logout')->middleware('auth:api');

	Route::middleware('auth:api')->group(function () {

	    Route::get('user', 'LoginController@user');

	    Route::group(['prefix' => '/admin','namespace' => 'Admin','middleware' => ['admin']], function () {

	    	Route::get('/admin', 'AdminController@index');

	    	Route::get('/auth', 'AdminController@auth');

	    	Route::get('/getcarscats', 'AdminController@getcarscats');

	    	Route::get('/getcarscolors', 'AdminController@getcarscolors');

	    	Route::post('/addcarscat', 'AdminController@addcarscat');

	    	Route::post('/getcarbrands', 'AdminController@getcarbrands');

	    	Route::post('/getcarmodels', 'AdminController@getcarmodels');

	    	Route::post('/addcarsbrand', 'AdminController@addcarsbrand');

	    	Route::post('/addcarsmodel', 'AdminController@addcarsmodel');

	    	Route::post('/addcarscolor', 'AdminController@addcarscolor');

	    	Route::post('/addriver', 'Drivers\DriversController@addriver');

	    	Route::post('/addcar', 'AdminController@addcar');

	    });

	    Route::get('/usersactive', 'UserController@getUserActive');

	    Route::post('/cords', 'CordsCarController@saveCordCar');

	    Route::get('/getcords', 'CordsCarController@getCordsCars');

	    Route::post('cors/check', 'CorsController@check');

	    Route::post('cors/cords', 'CordsCarController@saveCorsCordCar');

	});	

});
