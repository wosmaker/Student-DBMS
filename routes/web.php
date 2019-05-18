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
})->name('welcome');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('regissubject', 'RegisSubjectController');
Route::resource('updatereceipt', 'UpdateReceiptController');
//Route::resource('editsubject', 'EditSubjectController');
//Route::resource('problemreport', 'ProblemReportController');
Route::resource('confirmreceipt', 'ConfirmReceiptController');
Route::resource('personal', 'PersonalController');




Route::get('problemreport','ProblemReportController@index')->name('problemreport.index');
Route::get('problemreport/{id}/edit' , 'ProblemReportController@update')->name('problemreport.edit');
Route::post('problemreport', 'ProblemReportController@store')->name('problemreport.store');
Route::delete('problemreport/{id}', 'ProblemReportController@destroy')->name('problemreport.destroy');
Route::patch('problemreport/{id}' , 'ProblemReportController@update')->name('problemreport.update');



Route::get('editsubject','EditSubjectController@index')->name('editsubject.index');
Route::post('editsubject', 'EditSubjectController@store')->name('editsubject.store');
Route::delete('editsubject/{id}', 'EditSubjectController@destroy')->name('editsubject.destroy');
Route::patch('editsubject/{id}' , 'EditSubjectController@update')->name('editsubject.update');
Route::post('editsubject/search_subject', 'EditSubjectController@search_subject')->name('editsubject.search_subject');


Route::resource('faculty', 'Csimple\Cfaculty');
Route::post('faculty/update', 'Csimple\Cfaculty@update')->name('faculty.update');
Route::post('faculty/destroy/{id}', 'Csimple\Cfaculty@destroy');


Route::get('/test1', function () {
	return view('complex-form.editsubject.index');
});


//test
for($i=1;$i<=16;$i++)
{
	Route::resource('report'.$i, 'CAnalytic\report'.$i);
}

Route::get('/test', function () {
    return view('complex-form.person-inf');
});
