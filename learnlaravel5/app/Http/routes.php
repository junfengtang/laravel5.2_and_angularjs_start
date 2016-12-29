<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

function rq($key=null,$default=null){
    if(!$key){
        return Request::all();
    }
    return Request::get($key,$default);
}
function userins(){
    return new App\User;
}
function questionins(){
    return new App\Question;
}

Route::get('/', function () {
    return view('welcome');
});

Route::get('api', function () {
    return ['version'=>0.1];
});

Route::any('user/signup', function () {
   return userins()->signup();
});

Route::any('user/login', function () {
   return userins()->login();
});

Route::any('user/logout', function () {
   return userins()->logout();
});

Route::any('api/question/add', function () {
   return questionins()->add();
});




Route::any('test',function(){
    dd(userins()->is_logged_in());
});