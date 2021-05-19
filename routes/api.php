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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/Authenticated', function () {
    return true;
});




Route::post('registeraccount','RegisterControl@register');
Route::post('login','RegisterControl@login');
Route::post('logout','RegisterControl@logout');


Route::post('SaveVendor','VendorController@store');
Route::post('DeleteVendor','VendorController@Delete');
Route::get('LoadVen','VendorController@index');
Route::get('LoadVen2','VendorController@indexPagination');
Route::post('updateVendor','VendorController@update');
Route::get('LiveSearchVen','VendorController@Search');

Route::get('LoadPo','PoDetailsControl@LoadPo');
Route::get('GetPo','PoDetailsControl@GetPo');
Route::get('GetPoforReceiving','PoDetailsControl@GetPoReceived');
Route::get('GetPoHead','PoDetailsControl@GetPoHead');
Route::post('DeletePOItem','PoDetailsControl@DeleteItem');
Route::post('SavePo','PoDetailsControl@store');
Route::post('ChangeStatus','PoDetailsControl@ChangeStatus');


Route::get('LoadCus','CustommerController@LoadCus');
Route::get('LoadlistCus','CustommerController@LoadlistCus');
Route::get('LoadCus2','CustommerController@LoadCusPagination');
Route::post('SaveCus','CustommerController@store');
Route::post('updateCus','CustommerController@update');
Route::get('LiveSearchCus','CustommerController@Search');
Route::post('DeleteCustomer','CustommerController@Delete');

Route::post('SaveItem','itemController@SaveItem');
Route::get('LiveSearchItem','itemController@Search');
Route::get('LoadItems','itemController@LoadItems');
Route::get('LoadItems2','itemController@LoadItemsPagination');
Route::post('updateItems','itemController@update');
Route::post('DeleteItem','itemController@Delete');

Route::get('treedata','LocationController@treedata');
Route::post('SaveNode','LocationController@Save');
Route::get('itemsInside','LocationDetailsController@SelectedParent');
Route::post('saveItemtoLoaction','LocationDetailsController@save');

Route::get('stocks','receivingController@stocks');
Route::post('SaveReceived','receivingController@store');
Route::get('getitem','receivingController@item');
Route::get('ReceivedItems','receivingController@ReceivedItems');
Route::post('ChangeStatusFromReceived','receivingController@ChangeStatus');

Route::post('SaveCusDevice','DeviceController@SaveCusDevice');
Route::get('getDevices','DeviceController@GetCusDevice');

Route::post('SaveInvoice','SalesController@SaveInvoice');
Route::get('LoadInvoive','SalesController@LoadInvoive');
Route::post('ApprovedInvoice','SalesController@ApprovedInvoice');
Route::get('GetInvoice','SalesController@GetInvoice');
Route::get('GetInvoiceWithDetails','SalesController@GetJointInvoice');
Route::get('GetInvoiceHead','SalesController@GetInvoiceHead');
Route::get('history','SalesController@history');
Route::get('Saleshistory','SalesController@Saleshistory');
Route::get('searchtramsaction','SalesController@SearchTrans'); 

Route::get('SaveEmployee','EmployeesController@store'); 
Route::get('LoadEmployee','EmployeesController@LoadEmp'); 
Route::get('searchEmployee','EmployeesController@Search'); 

Route::post('SaveCompany','CompanyController@SaveCompany');
Route::get('getCompany','CompanyController@getCompany');
Route::post('setCompany','CompanyController@setCompany');

Route::get('getUser','userController@getUser');

Route::post('saveInvite','InviteController@saveInvite');
Route::get('getNotif','InviteController@getNotif');
Route::post('accepted','InviteController@accepted');

Route::get('menu','MenuController@menu'); 
Route::get('allmenu','MenuController@allmenu'); 
 
