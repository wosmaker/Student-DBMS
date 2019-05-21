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


Route::get('personal','PersonalController@index')->name('personal.index');
Route::get('personal/{id}/edit' , 'PersonalController@edit')->name('personal.edit');
Route::post('personal', 'PersonalController@store')->name('personal.store');
Route::delete('personal/destroy', 'PersonalController@destroy')->name('personal.destroy');
Route::patch('personal/update' , 'PersonalController@update')->name('personal.update');


Route::get('updatereceipt','UpdateReceiptController@index')->name('updatereceipt.index');
Route::get('updatereceipt/{id}/edit' , 'UpdateReceiptController@edit')->name('updatereceipt.edit');
Route::post('updatereceipt', 'UpdateReceiptController@store')->name('updatereceipt.store');
Route::delete('updatereceipt/destroy', 'UpdateReceiptController@destroy')->name('updatereceipt.destroy');
Route::patch('updatereceipt/update' , 'UpdateReceiptController@update')->name('updatereceipt.update');

Route::get('confirmreceipt','ConfirmReceiptController@index')->name('confirmreceipt.index');
Route::post('confirmreceipt/confirm' , 'ConfirmReceiptController@confirm')->name('confirmreceipt.confirm');
Route::post('confirmreceipt/denied' , 'ConfirmReceiptController@denied')->name('confirmreceipt.denied');


Route::get('problemreport','ProblemReportController@index')->name('problemreport.index');
Route::get('problemreport/{id}/edit' , 'ProblemReportController@edit')->name('problemreport.edit');
Route::post('problemreport', 'ProblemReportController@store')->name('problemreport.store');
Route::delete('problemreport/destroy', 'ProblemReportController@destroy')->name('problemreport.destroy');
Route::patch('problemreport/update' , 'ProblemReportController@update')->name('problemreport.update');

Route::get('regissubject','RegisSubjectController@index')->name('regissubject.index');
Route::get('regissubject/{id}/edit' , 'RegisSubjectController@edit')->name('regissubject.edit');
Route::post('regissubject', 'RegisSubjectController@store')->name('regissubject.store');
Route::delete('regissubject/destroy', 'RegisSubjectController@destroy')->name('regissubject.destroy');
Route::patch('regissubject/update' , 'RegisSubjectController@update')->name('regissubject.update');

Route::post('regissubject/search_subject' , 'RegisSubjectController@search_subject')->name('regissubject.search_subject');



Route::get('editsubject','EditSubjectController@index')->name('editsubject.index');
Route::post('editsubject', 'EditSubjectController@store')->name('editsubject.store');
Route::delete('editsubject/{id}', 'EditSubjectController@destroy')->name('editsubject.destroy');
Route::patch('editsubject/{id}' , 'EditSubjectController@update')->name('editsubject.update');

Route::post('editsubject/destroy_subject', 'EditSubjectController@destroy_subject')->name('editsubject.destroy_subject');
Route::post('editsubject/destroy_section', 'EditSubjectController@destroy_section')->name('editsubject.destroy_section');
Route::post('editsubject/destroy_period', 'EditSubjectController@destroy_period')->name('editsubject.destroy_period');

Route::post('editsubject/search_subject', 'EditSubjectController@search_subject')->name('editsubject.search_subject');
Route::post('editsubject/search_section', 'EditSubjectController@search_section')->name('editsubject.search_section');
Route::post('editsubject/search_period', 'EditSubjectController@search_period')->name('editsubject.search_period');
Route::post('editsubject/search_room', 'EditSubjectController@search_room')->name('editsubject.search_room');
Route::post('editsubject/search_teacher', 'EditSubjectController@search_teacher')->name('editsubject.search_teacher');

Route::post('editsubject/add_subject','EditSubjectController@add_subject')->name('editsubject.add_subject');
Route::post('editsubject/add_section','EditSubjectController@add_section')->name('editsubject.add_section');
Route::post('editsubject/add_period','EditSubjectController@add_period')->name('editsubject.add_period');


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
