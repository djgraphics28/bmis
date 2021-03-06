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

use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

/* Admin Routes */
Route::get('/admin', 'AdminController@index');
Route::get('/admin-profile', 'AdminController@adminProfile');
Route::get('/admin-record', 'AdminController@getSeniorCitizenPage');
Route::post('/save-record', 'AdminController@saveRecord');
Route::post('/admin-get-provinces', 'AdminController@getProvinces');
Route::post('/admin-get-cities', 'AdminController@getCities');
Route::post('/admin-del-record', 'AdminController@deleteRecord');
Route::post('/admin-get-record', 'AdminController@getSpecificRecord');
Route::get('/admin-edit-record/{id}', 'AdminController@editRecord');
Route::post('/update-record', 'AdminController@saveRecord');
Route::get('/admin-senior-contributions', 'AdminController@getSeniorContribution');
Route::get('/admin-senior-pension', 'AdminController@getSeniorPension');
Route::get('/admin-users', 'AdminController@getAdminUsers');
Route::post('/save-contribution', 'AdminController@saveContribution');
Route::post('/save-pension', 'AdminController@savePension');
Route::post('/get-contribution-data', 'AdminController@getContributionData');
Route::post('/get-pension-data', 'AdminController@getPensionData');
Route::post('/admin-del-contribution', 'AdminController@deleteContribution');
Route::post('/admin-del-pension', 'AdminController@deletePension');
Route::post('/admin-del-user', 'AdminController@deleteUser');
Route::get('/admin-add-user', 'AdminController@getAddUser');
Route::post('/save-user', 'AdminController@saveUser');
Route::post('/admin-change-password', 'AdminController@changePassword');
Route::get('/admin-edit-user/{id}', 'AdminController@editUser');
Route::post('/change-password', 'AdminController@changeUserPassword');

// barangay routes
Route::get('/admin-member', 'AdminController@getMembersPage');
Route::get('/admin-barangayclearance','AdminController@getBarangayClearancePage');
Route::get('/admin-businessclearance','AdminController@getBusinessClearancePage');
Route::get('/admin-closureclearance','AdminController@getClosureClearancePage');
Route::get('/admin-indigencycertificate','AdminController@getIndigencyCertificatePage');

Route::post('/get-data-for-modal','AdminController@getDataForModal');

Route::get('/barangay-clearance/{id}', 'AdminController@pdfBarangayClearance');
Route::get('/business-clearance/{id}', 'AdminController@pdfBusinessClearance');
Route::get('/closure-clearance/{id}', 'AdminController@pdfClosureClearance');
Route::get('/indigency-certificate/{id}', 'AdminController@pdfIndigencyCertificate');

// barangay routes

/* DataTables */
Route::get('/admin-get-records', 'AdminController@getRecordsData');
