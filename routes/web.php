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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/home','Admin\IndexController@index')->middleware('auth','isClient');
//Route::post('/get-project','Admin\IndexController@getCompany');
Route::get('/test','User\HomeController@index');


Route::group(['middleware' => 'auth'], function () {
	Route::get('/admin/home','Admin\IndexController@index');
	Route::post('admin/get-project','Admin\IndexController@getCompany');
	Route::get('/admin/manage-user','Admin\UserController@index');
	Route::get('/admin/create-user','Admin\UserController@create');
	Route::get('/admin/get-user','Admin\UserController@getAllUser');
	Route::post('/admin/add-user','Admin\UserController@store');
	Route::get('/admin/edit-user/{id}','Admin\UserController@edit');
	Route::post('/admin/update-user/{id}','Admin\UserController@update');
	Route::get('/admin/delete-user/{id}','Admin\UserController@destroy');
	

	Route::get('admin/manage-client','Admin\ClientController@index');
	Route::get('/admin/create-client','Admin\ClientController@create');
	Route::post('/admin/add-client','Admin\ClientController@store');
	Route::get('/admin/edit-client/{id}','Admin\ClientController@edit');
	Route::post('/admin/update-client/{id}','Admin\ClientController@update');
	Route::get('/admin/delete-client/{id}','Admin\ClientController@destroy');

	Route::get('admin/manage-team','Admin\TeamController@index');
	Route::get('/admin/create-team','Admin\TeamController@create');
	Route::post('/admin/add-team','Admin\TeamController@store');
	Route::get('/admin/edit-team/{id}','Admin\TeamController@edit');
	Route::post('/admin/update-team/{id}','Admin\TeamController@update');
	Route::get('/admin/delete-team/{id}','Admin\TeamController@destroy');

	Route::get('admin/manage-projects','Admin\ProjectController@index');
	Route::get('admin/manage-projects/{id}','Admin\ProjectController@getCompanyProject');
	Route::get('admin/add-project/{id}','Admin\ProjectController@addProject');
	Route::get('admin/edit-project/{id}','Admin\ProjectController@editProject');
	Route::post('admin/edit-save-project/{id}','Admin\ProjectController@update');
	Route::post('admin/add-client-project/{id}','Admin\ProjectController@addClientProject');
	Route::get('admin/manage-task/{id}','Admin\TaskController@getTaskList');
	Route::get('admin/add-task/{id}','Admin\TaskController@addTaskInProject');
	Route::post('admin/add-task/{id}','Admin\TaskController@saveProjectTask');
	Route::post('admin/add-task-image','Admin\TaskController@saveTaskImage');
	Route::post('admin/save-task-position','Admin\TaskController@saveTaskPosition');
	Route::get('admin/edit-task/{id}','Admin\TaskController@editProjectTask');
	Route::post('admin/task-show-to-client/{id}','Admin\TaskController@showTaskToClient');

	

	Route::get('/client/home','Client\IndexController@index')->middleware('isClient');
	

	Route::get('/developer/home','Developer\IndexController@index')->middleware('isDeveloper');
	//Route::get('admin/dashboard','Admin\DashboardController@index');
	//Route::get('admin/create-shopkeeper','Admin\ShopkeeperController@create')->middleware('is_admin');
	//Route::get('admin/get-shopkeeper','Admin\ShopkeeperController@getallshopkeeper')->middleware('is_admin');
	//Route::post('admin/create-shopkeeper','Admin\ShopkeeperController@store')->middleware('is_admin');
    
});