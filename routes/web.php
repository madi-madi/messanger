<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/profile/{name}',function($name){
	return view('profile', compact('name'));
})->name('profile');

Route::get('/', function () {
    return view('welcome');

});

Route::get('messages',function(){
	return view('messages');
});

Route::get('getMessages',function(){
	$userOne = DB::table('users')
	->join('conversations','users.id','conversations.user_one')
	->where('conversations.user_two', Auth::user()->id)
	->get();

	$userTwo = DB::table('users')
	->join('conversations','users.id','conversations.user_two')
	->where('conversations.user_one', Auth::user()->id)
	->get();

	return array_merge($userOne->toArray() , $userTwo->toArray());


});


Route::get('getMessages/{id}',function($id){
	
	        	$userMsg = DB::table('messages')
	        	->leftJoin('users','users.id','messages.user_from')
	        	->where('messages.conversation_id',$id)->get();
	        	return $userMsg;


});

Route::post('sendMessage','MassengerController@sendMessage');

Route::post('upload','MassengerController@upload');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
