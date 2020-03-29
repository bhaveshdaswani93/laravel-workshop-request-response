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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/get-request',function() {
    // dd($_GET['first_name']); // 1
    if(request()->has('first_name')) {
        dd(request()->input('first_name')); //2
    } else {
        dd('First name is not defined');
    }
    
});

Route::post('/post-request',function() {
    dd(request()->all());
});

Route::post('/post-request-query',function() {
    // dd(request()->query('first_name'));
    dd(request()->query('email','lorem@gmail.com'));
    //,'default@gmail.com'
});

Route::put('/put-request-only',function(){
    dd(request()->only(['first_name','email']));
    // dd(request()->all());
    // Post::create(request()->all());
    // Post::create(request()->all());
});

Route::patch('/patch-request-except',function(){
    dd(request()->except('some_other_param'));
});

Route::post('/post-request-has',function(){
    if(request()->has('first_name')) {
        dd('Request has first_name param');
    } else {
        dd('Request does not have first_name param');
    }
});

Route::post('/post-request-filled',function(){
    if(request()->filled('email')) {
        // request()->input('email');
        dd(request()->email);
        // dd(request()->email);
    } else {
        dd('email is either empty or has not been provided');
    }
});

Route::post('/post-request-missing',function(){
    if(request()->missing('email')) {
        // if(!request()->has('email')) {
        dd('Email missing');
    } else {
        dd('All good email has been provided good.');
    }
});

Route::get('/get-request-response',function(){
    return response()->json([
        'email' => 'bhaveshdaswani93@gmail.com',
        'first_name' =>'bhavesh'
    ],401);
});

Route::get('/get-request-before-middleware',function(){
    return response()->json('before middleware passed successfully.');
})->middleware('before','after');

