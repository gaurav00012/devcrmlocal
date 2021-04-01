<?php
use App\User;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/create-user',function(){
	$user = new App\User();
	$user->password = Hash::make('test12345');
	$user->email = 'diwakar@deverybody.com';
	$user->name = 'Diwakar';
	$user->user_role = 1;
	$user->save();
});
Route::get("/email",'User\HomeController@email');

Auth::routes(['register' => false]);
//Auth::routes(['register' => false]);

 Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/home','Admin\IndexController@index')->middleware('auth','isClient');
//Route::post('/get-project','Admin\IndexController@getCompany');
//Route::get('/test','User\HomeController@index');
Route::get('/get-started','Frontend\WebController@index');
Route::post('/','Frontend\WebController@store');
Route::get('/test-zoho','Frontend\WebController@testZoho');

Route::get('/test-paypal-token',function(){


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.sandbox.paypal.com/v1/oauth2/token",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "grant_type=client_credentials",
  CURLOPT_HTTPHEADER => array(
    "authorization: Basic QVRTTkV5ZmxzMVIzenFNdWxEUFpLQXBMUUZpTEdybGhEZF9pSW9QV2tGZEhuT1ZFRmNjM1lDWUVXWUNna2RkdEU1SGgybzR5aGNiRWtRdVI6RUoyWkJIUjRPOV9XQUgxREtLM0dYOTJOVGVuTnd4ejVXallIMkZ4LXE2Z21zbFlBTWpOU0hGc1JfQWVoQVdvb2xzYUZFM2ZBTks0a0R2WkI=",
    "cache-control: no-cache",
    "content-type: application/x-www-form-urlencoded",
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
});

Route::get('/generate-next-invoice-number',function(){
	// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.sandbox.paypal.com/v2/invoicing/generate-next-invoice-number');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);

$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Authorization: Bearer A21AAIxoIA_mdVrvbMLH9pcTwh1TS6ZHnS1x3jaNW-9LbsKnnOpyam1urIpo56rxsdBuKau5IDN_Px1MboNehSFl-161t7H4Q';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
else{
	echo $result;
}
curl_close($ch);
});

Route::get('/list-invoices',function(){
	// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.sandbox.paypal.com/v2/invoicing/invoices?total_required=true');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Authorization: Bearer A21AAJv9Nshodh8JRgb3Uaj9cTMDfNQXWyJ5rHdAFlMGauRTI3cNXzAKDj_nVKhQHtsDaSqteU9J5R-foJHJt1z9tpoXg6Njw';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}else{
	echo $result;
}
curl_close($ch);
});

Route::get('/create-draft-invoice',function(){
	// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.sandbox.paypal.com/v2/invoicing/invoices');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"detail\": {\n    \"invoice_number\": \"#0001\",\n    \"reference\": \"deal-ref\",\n    \"invoice_date\": \"2018-11-12\",\n    \"currency_code\": \"USD\",\n    \"note\": \"Thank you for your business.\",\n    \"term\": \"No refunds after 30 days.\",\n    \"memo\": \"This is a long contract\",\n    \"payment_term\": {\n      \"term_type\": \"NET_10\",\n      \"due_date\": \"2018-11-22\"\n    }\n  },\n  \"invoicer\": {\n    \"name\": {\n      \"given_name\": \"David\",\n      \"surname\": \"Larusso\"\n    },\n    \"address\": {\n      \"address_line_1\": \"1234 First Street\",\n      \"address_line_2\": \"337673 Hillside Court\",\n      \"admin_area_2\": \"Anytown\",\n      \"admin_area_1\": \"CA\",\n      \"postal_code\": \"98765\",\n      \"country_code\": \"US\"\n    },\n    \"email_address\": \"aggarwal.gaurav611@gmail.com\",\n    \"phones\": [\n      {\n        \"country_code\": \"001\",\n        \"national_number\": \"4085551234\",\n        \"phone_type\": \"MOBILE\"\n      }\n    ],\n    \"website\": \"www.test.com\",\n    \"tax_id\": \"ABcNkWSfb5ICTt73nD3QON1fnnpgNKBy- Jb5SeuGj185MNNw6g\",\n    \"logo_url\": \"https://example.com/logo.PNG\",\n    \"additional_notes\": \"2-4\"\n  },\n  \"primary_recipients\": [\n    {\n      \"billing_info\": {\n        \"name\": {\n          \"given_name\": \"Stephanie\",\n          \"surname\": \"Meyers\"\n        },\n        \"address\": {\n          \"address_line_1\": \"1234 Main Street\",\n          \"admin_area_2\": \"Anytown\",\n          \"admin_area_1\": \"CA\",\n          \"postal_code\": \"98765\",\n          \"country_code\": \"US\"\n        },\n        \"email_address\": \"bill-me@example.com\",\n        \"phones\": [\n          {\n            \"country_code\": \"001\",\n            \"national_number\": \"4884551234\",\n            \"phone_type\": \"HOME\"\n          }\n        ],\n        \"additional_info_value\": \"add-info\"\n      },\n      \"shipping_info\": {\n        \"name\": {\n          \"given_name\": \"Stephanie\",\n          \"surname\": \"Meyers\"\n        },\n        \"address\": {\n          \"address_line_1\": \"1234 Main Street\",\n          \"admin_area_2\": \"Anytown\",\n          \"admin_area_1\": \"CA\",\n          \"postal_code\": \"98765\",\n          \"country_code\": \"US\"\n        }\n      }\n    }\n  ],\n  \"items\": [\n    {\n      \"name\": \"Yoga Mat\",\n      \"description\": \"Elastic mat to practice yoga.\",\n      \"quantity\": \"1\",\n      \"unit_amount\": {\n        \"currency_code\": \"USD\",\n        \"value\": \"50.00\"\n      },\n      \"tax\": {\n        \"name\": \"Sales Tax\",\n        \"percent\": \"7.25\"\n      },\n      \"discount\": {\n        \"percent\": \"5\"\n      },\n      \"unit_of_measure\": \"QUANTITY\"\n    },\n    {\n      \"name\": \"Yoga t-shirt\",\n      \"quantity\": \"1\",\n      \"unit_amount\": {\n        \"currency_code\": \"USD\",\n        \"value\": \"10.00\"\n      },\n      \"tax\": {\n        \"name\": \"Sales Tax\",\n        \"percent\": \"7.25\"\n      },\n      \"discount\": {\n        \"amount\": {\n          \"currency_code\": \"USD\",\n          \"value\": \"5.00\"\n        }\n      },\n      \"unit_of_measure\": \"QUANTITY\"\n    }\n  ],\n  \"configuration\": {\n    \"partial_payment\": {\n      \"allow_partial_payment\": true,\n      \"minimum_amount_due\": {\n        \"currency_code\": \"USD\",\n        \"value\": \"20.00\"\n      }\n    },\n    \"allow_tip\": true,\n    \"tax_calculated_after_discount\": true,\n    \"tax_inclusive\": false,\n    \"template_id\": \"TEMP-19V05281TU309413B\"\n  },\n  \"amount\": {\n    \"breakdown\": {\n      \"custom\": {\n        \"label\": \"Packing Charges\",\n        \"amount\": {\n          \"currency_code\": \"USD\",\n          \"value\": \"10.00\"\n        }\n      },\n      \"shipping\": {\n        \"amount\": {\n          \"currency_code\": \"USD\",\n          \"value\": \"10.00\"\n        },\n        \"tax\": {\n          \"name\": \"Sales Tax\",\n          \"percent\": \"7.25\"\n        }\n      },\n      \"discount\": {\n        \"invoice_discount\": {\n          \"percent\": \"5\"\n        }\n      }\n    }\n  }\n}");

$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Authorization: Bearer A21AAJ83E95qMxLUyyHG5f64Ssc0XV-BeuV6F4bK1l3hhk2an7mSI2MV0HPUle12Mx00MyzSDbG92gDotZ-EWR7DqJtsb-NCw';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
else{
	echo $result;
}
curl_close($ch);
});

Route::get('view-invoice/{invoiceId}','Client\IndexController@viewInvoice');
Route::get('/cancel-paypal/{invoiceId}',function($id){
	echo 'Payment of invoice '.$id.' is cancelled.';
});
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
	Route::get('admin/new-registerations','Admin\ClientController@newRegisteration');
	Route::post('admin/get-new-client','Admin\ClientController@getNewClient');
	Route::post('admin/approve-client','Admin\ClientController@approveClient');

	// Route::post('admin/approve-client',function(){
	// 	echo 'hello wrld';
	// });

	Route::get('admin/manage-team','Admin\TeamController@index');
	Route::get('/admin/create-team','Admin\TeamController@create');
	Route::post('/admin/add-team','Admin\TeamController@store');
	Route::get('/admin/edit-team/{id}','Admin\TeamController@edit');
	Route::post('/admin/update-team/{id}','Admin\TeamController@update');
	Route::get('/admin/delete-team/{id}','Admin\TeamController@destroy');

	Route::get('admin/manage-projects','Admin\ProjectController@index');
	Route::get('admin/manage-projects/{id}','Admin\ProjectController@getCompanyProject');
	Route::get('admin/add-project/{id}','Admin\ProjectController@addProject');

	Route::post('admin/add-project/{id}','Admin\ProjectController@addClientProject');

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
	Route::post('admin/update-task/{id}','Admin\TaskController@updateTask');
	Route::post('admin/add-comment/{taskId}','Admin\TaskController@addComment');
	Route::post('admin/save-comment/{taskId}','Admin\TaskController@saveComment');
	Route::get('admin/download-comment-file/{filename}','Admin\TaskController@downloadCommentfile');
	Route::post('admin/edit-comment/','Admin\TaskController@editComment');
	Route::post('admin/update-comment/{commentid}','Admin\TaskController@updateComment');
	Route::get('admin/manage-invoice/{companyId}','Admin\InvoiceController@getAllInvoice');
	Route::get('admin/create-invoice/{companyId}','Admin\InvoiceController@create');
	Route::post('admin/create-invoice/{companyId}','Admin\InvoiceController@store');
	Route::get('admin/view-invoice/{invoiceid}','Admin\InvoiceController@viewInvoice');
	Route::get('admin/manage-ticket','Admin\TicketController@index');
	Route::get('admin/view-ticket/{id}','Admin\TicketController@show');
	Route::post('admin/view-ticket/{id}','Admin\TicketController@saveTicketStatus');
	//Route::get('client/home','Client\IndexController@index')->middleware('isClient');
	Route::get('/{slug}','Client\IndexController@index')->middleware('isClient');
	Route::get('view-ticket/{ticketId}','Client\IndexController@viewTicket')->middleware('isClient');
	Route::post('view-ticket/{ticketId}','Client\IndexController@saveTicketStatus')->middleware('isClient');

	Route::post('client/edit-task','Client\IndexController@editTask')->middleware('isClient');
	Route::post('client/add-comment/{taskId}','Client\IndexController@addComment')->middleware('isClient');
	Route::post('client/edit-comment/','Client\IndexController@editComment')->middleware('isClient');
	Route::post('client/update-comment/{commentid}','Client\IndexController@updateComment')->middleware('isClient');
	Route::get('client/download-file/{filename}','Client\IndexController@downloadfile')->middleware('isClient');	
	Route::post('client/create-ticket','Client\IndexController@createTicket')->middleware('isClient');	
	Route::post('client/update-notification','Client\IndexController@updateNotification');
	Route::get('view-invoice/{invoiceId}','Client\IndexController@viewInvoice');

	Route::group(['middleware' => 'isDeveloper'], function () {
	Route::get('/developer/home','Developer\IndexController@index');
	Route::post('/developer/edit-task','Developer\IndexController@editTask');
	Route::get('/developer/download-file/{filename}','Developer\IndexController@downloadfile');
	Route::post('developer/add-comment/{taskId}','Developer\IndexController@addComment');
	Route::post('developer/edit-comment','Developer\IndexController@editComment');
	Route::post('developer/update-comment/{commentid}','Developer\IndexController@updateComment');
	Route::post('developer/start-task/{taskId}','Developer\IndexController@startTask');
	Route::post('/developer/get-time-log','Developer\IndexController@getTimeLog');
	Route::post('/developer/update-notification','Developer\IndexController@updateNotification');
	});
	Route::get('profile','Common\ProfileController@index');
	Route::post('profile','Common\ProfileController@saveprofile');
	//Route::get('admin/dashboard','Admin\DashboardController@index');
	//Route::get('admin/create-shopkeeper','Admin\ShopkeeperController@create')->middleware('is_admin');
	//Route::get('admin/get-shopkeeper','Admin\ShopkeeperController@getallshopkeeper')->middleware('is_admin');
	//Route::post('admin/create-shopkeeper','Admin\ShopkeeperController@store')->middleware('is_admin');
    Route::group(['middleware' => 'isSuperAdmin'], function () {
    Route::get('/super-admin/home','SuperAdmin\IndexController@index');
    Route::get('super-admin/manage-client','SuperAdmin\ClientController@index');
    Route::get('/super-admin/create-client','SuperAdmin\ClientController@create');
	Route::post('/super-admin/create-client','SuperAdmin\ClientController@store');
	Route::get('/super-admin/edit-client/{id}','SuperAdmin\ClientController@edit');
	});
   
});
