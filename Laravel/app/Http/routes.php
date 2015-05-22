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

// 首页
Route::get('/', 'HomeController@index');

// 关于我们页面
Route::get('aboutus/{name?}', 'AboutusController@index')->where('name', '[A-Za-z]+');

// 测试路由
// Route::get('home', function() {
//  echo "登陆成功了。";
// });
// Route::get('home', 'HomeController@index');

// 注册、登陆、忘记密码、退出
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

// 只有登陆、退出
// Route::get('auth/login', 'Auth\AuthController@getLogin');
// Route::post('auth/login', 'Auth\AuthController@postLogin');
// Route::get('auth/logout', 'Auth\AuthController@getLogout');

// 前台-页面详情
Route::get('pages/{id}', 'PagesController@show');

// 提交评论
Route::post('comment/store', 'CommentsController@store');

// 后台相关路由
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function()
{
  Route::get('/', 'AdminHomeController@index');
  Route::resource('pages', 'PagesController');
  Route::resource('articles', 'ArticlesController');
  Route::resource('comments', 'CommentsController');
});
