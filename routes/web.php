

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
//Route for Wellcome Page
Route::get('/', function () {
    return view('welcome');
});

//Route for Member
Route::get('member/index','MemberController@index'); // index/ list page
Route::get('member/detail/{id}','MemberController@detail'); // item details page
Route::get('member/form/{id?}','MemberController@form'); // form page/ create or update
Route::post('member/save','MemberController@save'); // store url/ no view, redirect to index page
Route::get('member/delete/{id?}','MemberController@destroy');//For deleting object.

//Route for Bazar
Route::get('bazar/index','BazarController@index'); // index/ list page
Route::get('bazar/detail/{id}','BazarController@detail'); // item details page
Route::get('bazar/form/{id?}','BazarController@form'); // form page/ create or update
Route::post('bazar/save','BazarController@save'); // store url/ no view, redirect to index page
Route::get('bazar/delete/{id?}','BazarController@destroy');//For deleting object.


//Route for deposit
Route::get('deposit/index','DepositController@index'); // index/ list page
Route::get('deposit/detail/{id}','DepositController@detail'); // item details page
Route::get('deposit/form/{id?}','DepositController@form'); // form page/ create or update
Route::post('deposit/save','DepositController@save'); // store url/ no view, redirect to index page
Route::get('deposit/delete/{id?}','DepositController@destroy');//For deleting object.

//Route for deposit
Route::get('mealcount/index','MealcountController@index'); // index/ list page
Route::get('mealcount/detail/{id}','MealcountController@detail'); // item details page
Route::get('mealcount/form/{id?}','MealcountController@form'); // form page/ create or update
Route::post('mealcount/save','MealcountController@save'); // store url/ no view, redirect to index page
Route::get('mealcount/delete/{id?}','MealcountController@destroy');//For deleting object.


//reports
Route::get('report/bazar','BazarReportController@bazar'); // bazar
Route::get('report/meal','MealReportController@meal'); // meal
Route::get('report/summery','SummeryReportController@summery'); // summery





