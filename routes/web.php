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

Auth::routes();
// Common 

Route::get('login',[
	'as'=>'log_in',
	'uses'=>'PageController@getLogin'
	]);  

Route::post('postlogin',[
	'as'=>'post_login',
	'uses'=>'PageController@postLogin'
	]); 

Route::get('logout',[ 
	'as'=>'log_out', 		
	'uses'=>'PageController@logout'
	]);

Route::get('signup',[
	'as'=>'sign_up',
	'uses'=>'PageController@getSignup'
	]);

Route::post('postSignup',[
	'as'=>'post_signup',
	'uses'=>'PageController@postSignup'
	]);


// Guest
Route::get('guest/home',[
	'as'=>'guest_home',
	'uses'=>'PageController@getGuestHome'
	]);

Route::get('guest/detailMatch',[
	'as'=>'guest_detail_match',
	'uses'=>'PageController@getGuestDetailMatch'
	]);

Route::get('guest/schedule',[
	'as'=>'guest_schedule',
	'uses'=>'PageController@getGuestSchedule'
	]);
// User
Route::get('user/home',[
	'as'=>'user_home',
	'uses'=>'PageController@getUserHome'
	]);

Route::post('user/postBetting',[
	'as'=>'post_bet',
	'uses'=>'PageController@postBetting'
	]);

Route::get('user/schedule',[
	'as'=>'user_schedule',
	'uses'=>'PageController@getUserSchedule'
	]);

Route::get('user/profile',[
	'as'=>'user_profile',
	'uses'=>'PageController@getUserProfile'
	]);

Route::post('user/postProfile',[
	'as'=>'user_post_profile',
	'uses'=>'PageController@postUserProfile'
	]);

Route::get('user/cart',[
	'as'=>'user_cart',
	'uses'=>'PageController@getUserCart'
	]);

Route::post('user/postCart',[
	'as'=>'user_post_cart',
	'uses'=>'PageController@postUserCart'
	]);

Route::get('user/bil',[
	'as'=>'user_bill',
	'uses'=>'PageController@getUserBill'
	]);

Route::get('user/followMatch',[
	'as'=>'user_follow_match',
	'uses'=>'PageController@getUserFollowMatch'
	]);

Route::get('user/historyBetting',[
	'as'=>'user_history_betting',
	'uses'=>'PageController@getUserHistoryBetting'
	]);

Route::get('user/detailMatch',[
	'as'=>'user_detail_match',
	'uses'=>'PageController@getUserDetailMatch'
	]);

Route::get('ajax/count/{count}','PageController@getCount');
// Admin
Route::get('admin/home',[
	'as'=>'admin_home',
	'uses'=>'PageController@getAdminHome'
	]);

Route::get('admin/matches',[
	'as'=>'admin_match',
	'uses'=>'PageController@getAdminMatches'
	]);

Route::get('admin/profile',[
	'as'=>'admin_get_profile',
	'uses'=>'PageController@getAdminProfile'
	]);

Route::post('admin/postProfile',[
	'as'=>'admin_post_profile',
	'uses'=>'PageController@postAdminProfile'
	]);

Route::get('admin/getCreateMatch',[
	'as'=>'admin_create_match',
	'uses'=>'PageController@getAdminFollowMatch'
	]);

Route::post('admin/postCreateMatch',[
	'as'=>'admin_post_create_match',
	'uses'=>'PageController@postAdminCreateMatch'
	]);

Route::post('admin/postMatche',[
	'as'=>'admin_post_match',
	'uses'=>'PageController@postAdminMatch'
	]);

Route::get('admin/postUpdateMatch',[
	'as'=>'admin_post_update_match',
	'uses'=>'PageController@postAdminUpdateMatch'
	]);

Route::get('admin/listUser',[
	'as'=>'admin_list_user',
	'uses'=>'PageController@getAdminListUser'
	]);

Route::get('admin/listMatch',[
	'as'=>'admin_list_match',
	'uses'=>'PageController@getAdminListMatch'
	]);

Route::get('admin/summary',[
	'as'=>'admin_summary',
	'uses'=>'PageController@getAdminSummary'
	]);

Route::get('admin/followMatch',[
	'as'=>'admin_follow_match',
	'uses'=>'PageController@getAdminSummaryFollowMatch'
	]);

Route::get('lienket',function(){
	Schema::create('bills',function($table){
		$table->increments('id');
		$table->integer('match_id')->unsigned();
		$table->integer('user_id');
		$table->float('bets');
		$table->integer('result');
		$table->forgein('match_id')->references('id')->on('matches');
	});
});
