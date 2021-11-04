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

// ResetpasswordForm
  Route::get('/resetpassword-form', 'Aefi\ResetpasswordController@ResetpasswordForm')->name('resetpassword-form');
  Route::post('/Reset_Password_Users', 'Aefi\ResetpasswordController@Reset_Password_Users')->name('Reset_Password_Users');

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
  Route::post('/UpdateConfirm', 'ManageUsersController@updateConfirm')->name('ajax.updateConfirm');

});

Route::group(['prefix' => 'Developer','middleware' => ['auth']], function() {
  Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('error-log-view');
});
//End PK

Route::get('/welcome', 'Aefi\AEFIController@welcome');
/* formaeif link */
Route::get('/form1', 'Aefi\Form1Controller@index')->name('form1');
Route::get('/List-Career', 'Aefi\Form1Controller@Get_Career_All')->name('list-career-json');
Route::get('/form1group', 'Aefi\Form1Controller@indexform1group')->name('form1group');
// Route::get('/form1', 'Aefi\Form1Controller@index')->name('form1');
Route::post('/form1/fetch', 'Aefi\AEFIController@fetch')->name('dropdown.fetch');
Route::post('/form1/fetchD', 'Aefi\AEFIController@fetchD')->name('dropdown.fetchD');
Route::get('/form2', 'Aefi\AEFIController@form2')->name('form2');

// dashboard
Route::get('/dashboard', 'Aefi\dashboardcontroller@dashboard')->name('dashboard');
Route::post('/dashboard', 'Aefi\dashboardcontroller@selectdatadash')->name('dashboard');
Route::get('/dashboardcovid', 'Aefi\dashboardcovidcontroller@dashboardcovid')->name('dashboardcovid');

// view form1
Route::get('/viewform1', 'Aefi\ViewAEFI1Controller@index')->name('viewform1');
Route::get('/AEFI506', 'Aefi\AEFIController@AEFI506')->name('AEFI506');

//select list aefi
Route::get('/lstf1', 'Aefi\SelectController@selectdatatablecaseAEFI1')->name('lstf1');
Route::post('/lstf1', 'Aefi\SelectController@selectdatatablecaseAEFI1src')->name('lstf1');
Route::get('/lstf2', 'Aefi\SelectController@selectdatatablecaseAEFI2')->name('lstf2');
Route::get('/lstf1group', 'Aefi\SelectController@selectdatatablecaseAEFI1group')->name('lstf1group');
Route::get('listaefi1', ['uses'=>'Aefi\ListAEFI1Controller@index', 'as'=>'listaefi1.list']);

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

// test
Route::get('/test', 'Aefi\testController@test')->name('test');
Route::get('/dataf1export', 'Aefi\DataexportController@dataexport')->name('dataf1export');
Route::post('/dataf1export', 'Aefi\DataexportController@dataexportfrm')->name('dataf1export');
Route::get('/dataf2export', 'Aefi\Dataexport2Controller@dataexport2')->name('dataf2export');
Route::get('/datauserexport', 'Aefi\DataexportuserController@dataexportu')->name('datauserexport');

// download Data
Route::get('/downloadaefi2', 'Aefi\DownloadController@dowloaddata2')->name('downloadaefi2');

// expert diag
Route::get('/ExpertDiagLst', 'Aefi\ExpertDiagController@ExpertDiagLst')->name('ExpertDiagLst');
Route::get('/ExpertDiagFrm', 'Aefi\ExpertDiagController@ExpertDiagFrm')->name('ExpertDiagFrm');
Route::get('/ExpertDiagEditFrm', 'Aefi\ExpertDiagController@ExpertDiagEditFrm')->name('ExpertDiagEditFrm');
Route::post('/InsertExpert', 'Aefi\ExpertDiagController@InsertExpert')->name('InsertExpert');
Route::post('/UpdateExpert', 'Aefi\ExpertDiagController@UpdateExpert')->name('UpdateExpert');
Route::get('/DeleteExpert', 'Aefi\ExpertDiagController@DeleteExpert')->name('DeleteExpert');
Route::get('/viewExpert', 'Aefi\ViewExpertController@index')->name('viewExpert');
Route::get('/ExpertExport', 'Aefi\ExpertExportController@index')->name('ExpertExport');
Route::post('/ExpertExport', 'Aefi\ExpertExportController@indexsrc')->name('ExpertExport');
// refer
Route::get('/ReferFrm', 'Aefi\ReferController@ReferFrm')->name('ReferFrm');
Route::post('/InsertRefer', 'Aefi\ReferController@InsertRefer')->name('InsertRefer');
Route::post('/UpdateRefer', 'Aefi\ReferController@UpdateRefer')->name('UpdateRefer');
Route::get('/DeleteRefer', 'Aefi\ReferController@DeleteRefer')->name('DeleteRefer');

// Symtoms By dose
Route::get('/SymtomsbyDoseLst', 'Aefi\SymtomsbyDoseController@SymtomsbyDoseLst')->name('SymtomsbyDoseLst');
Route::get('/SymtomsbyDoseFrm', 'Aefi\SymtomsbyDoseController@SymtomsbyDoseFrm')->name('SymtomsbyDoseFrm');
