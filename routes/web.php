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
Route::get('problemreport/{id}/edit' , 'ProblemReportController@edit')->name('problemreport.edit');
Route::post('problemreport', 'ProblemReportController@store')->name('problemreport.store');
Route::delete('problemreport/destroy', 'ProblemReportController@destroy')->name('problemreport.destroy');
Route::patch('problemreport/update' , 'ProblemReportController@update')->name('problemreport.update');



Route::get('editsubject','EditSubjectController@index')->name('editsubject.index');
Route::post('editsubject', 'EditSubjectController@store')->name('editsubject.store');
Route::delete('editsubject/{id}', 'EditSubjectController@destroy')->name('editsubject.destroy');
Route::patch('editsubject/{id}' , 'EditSubjectController@update')->name('editsubject.update');

Route::delete('editsubject/destroy_section', 'EditSubjectController@destroy_section')->name('editsubject.destroy_section');


Route::post('editsubject/search_subject', 'EditSubjectController@search_subject')->name('editsubject.search_subject');
Route::post('editsubject/search_section', 'EditSubjectController@search_section')->name('editsubject.search_section');


Route::post('editsubject/add_subject','EditSubjectController@add_subject')->name('editsubject.add_subject');
Route::post('editsubject/add_section','EditSubjectController@add_section')->name('editsubject.add_section');


//Route::resource('faculty', 'Csimple\Cfaculty');


Route::get('faculty','Csimple\Cfaculty@index')->name('faculty.index');
Route::get('faculty/{id}/edit' , 'Csimple\Cfaculty@update')->name('faculty.edit');
Route::post('faculty', 'Csimple\Cfaculty@store')->name('faculty.store');
Route::delete('faculty/{id}', 'Csimple\Cfaculty@destroy')->name('faculty.destroy');
Route::patch('faculty/{id}' , 'Csimple\Cfaculty@update')->name('faculty.update');

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
