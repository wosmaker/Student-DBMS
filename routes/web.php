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
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('regissubject', 'RegisSubjectController');
Route::resource('updatereceipt', 'UpdateReceiptController');
Route::resource('editsubject', 'EditSubjectController');
Route::resource('problemreport', 'ProblemReportController');
Route::resource('confirmreceipt', 'ConfirmReceiptController');

//test
for($i=1;$i<=16;$i++)
{
    $test = "/analytic".$i;
    Route::get($test, function () use($i){
        return view("Analytic.report".$i);
    });
}
