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
//Route::resource('editsubject', 'EditSubjectController');
Route::resource('problemreport', 'ProblemReportController');
Route::resource('confirmreceipt', 'ConfirmReceiptController');
Route::resource('personal', 'PersonalController');

Route::get('editsubject','EditSubjectController@index')->name('editsubject.index');
Route::post('editsubject', 'EditSubjectController@store')->name('editsubject.store');
Route::delete('editsubject/{editsubject}', 'EditSubjectController@destroy')->name('editsubject.destroy');
Route::patch('editsubject/{editsubject}' , 'EditSubjectController@update')->name('editsubject.update');
Route::get('editsubject/test', 'EditSubjectController@test')->name('editsubject.test');


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
