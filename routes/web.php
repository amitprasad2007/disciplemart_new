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


Auth::routes();
// Route::get('/', function () {
//     return redirect('login');
// });
Route::middleware(['auth'])->group(function () {




Route::resource('users', 'UserController');
Route::post("/usersdestroy","UserController@usersdestroy")->name("usersdestroy");


Route::get('users/change-status/{id}', 'UserController@changeStatus');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('categories','CategoriesController@index')->name('categories');
Route::get('categories/show/{id}','CategoriesController@show')->name('categories.show');
Route::post('categories/destroy{id}','CategoriesController@destroy')->name('categories.destroy');
Route::get('categories/edit/{id}','CategoriesController@edit')->name('categories.edit');
Route::put('categories/update/{id}','CategoriesController@update')->name('categories.update');
Route::get('categories/create','CategoriesController@create')->name('categories.create');
Route::post('categories/store','CategoriesController@store')->name('categories.store');
Route::get('categories/change-status/{id}', 'CategoriesController@changeStatus');

Route::resource('banners', 'BannerController');
Route::get('banners/change-status/{id}', 'BannerController@changeStatus');


Route::resource('advertisements', 'AdvertisementsController');
Route::get('advertisements/changestatus/{id}','AdvertisementsController@changeStatus');

Route::resource('cms', 'CmsController');

Route::resource('coupons', 'CouponsController');
Route::get('coupons/change-status/{id}', 'CouponsController@changeStatus');
Route::get('transactions', 'BookingController@transactions')->name('bookings.transactions');

Route::get('bookings', 'BookingController@bookings')->name('bookings.index');
Route::patch('bookings/{id}','BookingController@bookingUpdate')->name('bookings.update');
Route::get('bookings/{id}', 'BookingController@bookingDetails')->name('bookings.show');

Route::get('requests', 'BookingController@requests')->name('admin.requests');
Route::get('tickets', 'BookingController@tickets')->name('admin.tickets');
Route::get('tickets/change-status/{id}','BookingController@ticketsChangeStatus')->name('tickets.changeStatus');
Route::get('keywords', 'BookingController@Keywords')->name('admin.keywords');

Route::resource('courses', 'CoursesController');
Route::get('courses/change-status/{id}', 'CoursesController@changeStatus');
Route::any('multipleaction','CoursesController@multipleAction')->name('multipleaction');

 Route::get('chapters/{courseid}','ChaptersController@index')->name('chapters.index');
Route::get('chapters/create/{courseid}','ChaptersController@create')->name('chapters.create');
Route::post('chapters/create/{courseid}','ChaptersController@store')->name('chapters.store');
Route::get('chapters/{id}/{courseid}','ChaptersController@show')->name('chapters.show');
Route::get('chapters/{id}/edit/{courseid}','ChaptersController@edit')->name('chapters.edit');
Route::patch('chapters/{id}/{courseid}','ChaptersController@update')->name('chapters.update');
Route::delete('chapters/{id}/{courseid}','ChaptersController@destroy')->name('chapters.destroy');
Route::get('chapters/change-status/{id}/{courseid}','ChaptersController@changeStatus')
		->name('chapters.changeStatus');

Route::get('profile','HomeController@profile')->name('profile');
Route::PUT('profile/{id}', 'HomeController@updateProfile')->name('updateProfile');
Route::get('change-password', 'HomeController@changePassword')->name('changePassword');
Route::post('change-password','HomeController@changePassword')->name('changePassword');

Route::get('role/index','RoleController@index')->name('role.index');
Route::get('role/create','RoleController@create')->name('role.create');
Route::post('role/store','RoleController@store')->name('role.store');
Route::get('role/create','RoleController@create')->name('role.create');
Route::get('role/{id}/edit','RoleController@edit');
Route::PUT('role/{role}','RoleController@update')->name('role.update');
Route::DELETE ('role/{role}','RoleController@destroy')->name('role.destroy');
Route::resource('permissions', 'PermissionController');

});



