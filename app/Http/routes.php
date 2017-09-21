<?php

use \App\Http\Requests\Request;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/chat','ChatController@chat');
Route::get('/chat_{username}','ChatController@chat_user');
Route::post('/chat_{username}','ChatController@chat_user');

Route::get('/login','ChatController@getLogin');
Route::post('/loginPost','ChatController@postLogin');

Route::get('/register','ChatController@getRegister');
Route::post('/register','ChatController@postRegister');

Route::get('/logout_{username}','ChatController@logout');

//查看和编辑个人资料
Route::get('/myinfo_{username}','ChatController@infoShow_my');
Route::get('/info_edit/{username}/{gender}/{region}/{introduction}','ChatController@infoEdit');

//查看好友资料
Route::get('/friendinfo_{friend_id}','ChatController@infoShow_friend');

//删除好友
Route::get('/deleteFriend/{username}/{friend_id}','ChatController@deleteFriend');
//添加好友
Route::get('/newFriend/{username}/{newFriendEmail}','ChatController@newFriend');
//编辑单个好友分组
Route::get('/moveGroup/{username}/{friend_id}/{toGroupName}','ChatController@moveGroup');

//重命名分组
Route::get('/renameGroup/{group_id}/{newGroupName}','ChatController@renameGroup');
//删除分组
Route::get('/deleteGroup/{group_id}','ChatController@deleteGroup');
//添加分组
Route::get('/createGroup/{username}/{newGroupName}','ChatController@createGroup');

//查询消息
Route::post('/messages/{username}/{friendId}','ChatController@getMessage');
//发送消息
Route::post('/sendMessage','ChatController@sendMessage');
//更新消息状态为已读
Route::get('/updateMessage/{username}/{friend_id}','ChatController@updateMessage');