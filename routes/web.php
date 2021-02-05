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
//Start PK
Route::get('/', 'Auth\LoginController@ShowloginForm');

Route::get('/register-form', 'Aefi\RegisterController@RegForm')->name('register-form');
Route::post('/Saved-New-User', 'Aefi\RegisterController@Save_New_Users')->name('save-new-user');
Route::get('/List-Division', 'Aefi\RegisterController@Get_Division_All')->name('list-division-json');
Route::get('/MyProfile','ProfileController@index')->name('myprofile');
Route::post('/MyProfile','ProfileController@edit')->name('myprofile-edit');
//Speatie
Route::group(['prefix' => 'access-control','middleware' => ['auth']], function() {
  Route::get('/ManageRoles', 'RoleController@index')->name('roles.index');
  Route::get('/CreateRoles', 'RoleController@create')->name('roles.create'); //สร้างหน้า create.blade หรือ insert
  Route::post('/StoreRoles', 'RoleController@store')->name('roles.store'); //store คือการ insert
  Route::get('/ShowRoles/{id}', 'RoleController@show')->name('roles.show');
  Route::get('/EditRoles/{id}', 'RoleController@edit')->name('roles.edit');
  Route::patch('/UpdateRoles/{id}', 'RoleController@update')->name('roles.update');
  Route::delete('/DeleteRoles/{id}', 'RoleController@destroy')->name('roles.destroy');

  Route::get('/ListUsers', 'ManageUsersController@index')->name('listusers.index');
  Route::get('/CreateUsers', 'ManageUsersController@create')->name('listusers.create');
  Route::get('/EditUsers', 'ManageUsersController@edit')->name('listusers.edit');
});

Route::group(['prefix' => 'Developer','middleware' => ['auth']], function() {
  Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('error-log-view');
});
//End PK

Route::get('/welcome', 'Aefi\AEFIController@welcome');
/* formaeif link */
Route::get('/form1', 'Aefi\Form1Controller@index')->name('form1');
Route::get('/form1group', 'Aefi\Form1Controller@indexform1group')->name('form1group');
// Route::get('/form1', 'Aefi\Form1Controller@index')->name('form1');
Route::post('/form1/fetch', 'Aefi\AEFIController@fetch')->name('dropdown.fetch');
Route::post('/form1/fetchD', 'Aefi\AEFIController@fetchD')->name('dropdown.fetchD');
Route::get('/form2', 'Aefi\AEFIController@form2')->name('form2');
Route::get('/dashboard', 'Aefi\dashboardcontroller@dashboard')->name('dashboard');
Route::get('/AEFI506', 'Aefi\AEFIController@AEFI506')->name('AEFI506');
//select list aefi
Route::get('/lstf1', 'Aefi\SelectController@selectdatatablecaseAEFI1')->name('lstf1');
Route::get('/lstf2', 'Aefi\SelectController@selectdatatablecaseAEFI2')->name('lstf2');
Route::get('/lstf1group', 'Aefi\SelectController@selectdatatablecaseAEFI1group')->name('lstf1group');
// insert Data
Route::post('/insertform1', 'Aefi\InsertController@insertform1')->name('insertform1');
Route::post('/vaccineform1', 'Aefi\InsertController@vaccineform1')->name('vaccineform1');
Route::post('/insertform2', 'Aefi\InsertController@insertform2')->name('insertform2');
// update Data
Route::post('/updateform1', 'Aefi\UpdateController@updateform1')->name('updateform1');
Route::post('/updateform2', 'Aefi\UpdateController@updateform2')->name('updateform2');
// delete Data
Route::get('/deleteAEFI1', 'Aefi\DeleteController@deletedata1')->name('deleteAEFI1');
Route::get('/deleteAEFI2', 'Aefi\DeleteController@deletedata2')->name('deleteAEFI2');
// edit Data
Route::get('/EditAEFI1', 'Aefi\SelectController@selectalldataAEFI1')->name('EditAEFI1');
Route::get('/EditAEFI2', 'Aefi\SelectController@selectalldataAEFI2')->name('EditAEFI2');
Route::get('/lstef2', 'Aefi\SelectController@selectdatatableEditcaseAEFI2')->name('lstef2');
/* loginsys */
Auth::routes();
Route::get('/index', 'HomeController@index')->name('index');
// Route::post('/insertform1','Aefi\InsertController@welcome')
// test
Route::get('/test', 'Aefi\testController@test')->name('test');
Route::get('/dataf1export', 'Aefi\DataexportController@dataexport')->name('dataf1export');
Route::get('/dataf2export', 'Aefi\Dataexport2Controller@dataexport2')->name('dataf2export');
// Route::post('/uploadfile', 'Aefi\UploadController@upload');
// download Data
Route::get('/downloadaefi2', 'Aefi\DownloadController@dowloaddata2')->name('downloadaefi2');
// Route::get('/deleteAEFI2', 'Aefi\DeleteController@deletedata2')->name('deleteAEFI2');
