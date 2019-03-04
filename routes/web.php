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

Route::get('/', function () {
    return view('auth/login');
});

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/welcome', 'Aefi\AEFIController@welcome');
/* formaeif link */
// Route::get('/form1', 'Aefi\AEFIController@form1')->name('form1');
Route::get('/form1', 'Aefi\Form1Controller@index')->name('form1');
Route::post('/form1/fetch', 'Aefi\AEFIController@fetch')->name('dropdown.fetch');
Route::post('/form1/fetchD', 'Aefi\AEFIController@fetchD')->name('dropdown.fetchD');
Route::get('/form2', 'Aefi\AEFIController@form2')->name('form2');
Route::get('/dashboard', 'Aefi\AEFIController@dashboard')->name('dashboard');
Route::get('/AEFI506', 'Aefi\AEFIController@AEFI506')->name('AEFI506');
//select list aefi
Route::get('/lstf1', 'Aefi\SelectController@selectdatatablecaseAEFI1')->name('lstf1');
Route::get('/lstf2', 'Aefi\SelectController@selectdatatablecaseAEFI2')->name('lstf2');
// insert Data
Route::post('/insertform1', 'Aefi\InsertController@insertform1')->name('insertform1');
Route::post('/insertform2', 'Aefi\InsertController@insertform2')->name('insertform2');
// update Data
Route::post('/updateform1', 'Aefi\UpdateController@updateform1')->name('updateform1');
Route::post('/updateform2', 'Aefi\UpdateController@updateform2')->name('updateform2');
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
