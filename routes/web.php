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

//Route::get('/', "MainController@home");
Route::get('/', "BusinessController@home");

Route::get('/hello1', function () {
    return "Hola Mundo";
});

Route::get('/hello2', "MainController@hello2");
Route::get('/hello3', "MainController@hello3");

/*Route::get('/home', "MainController@home");
Route::get('/services', "MainController@services");
Route::get('/products', "MainController@products");
Route::get('/products/detail/{id}', "MainController@products_details");
Route::get('/faq', "MainController@faq");
Route::get('/contact', "MainController@contact");*/

Route::get('/contact', "BusinessController@contact")->name('contact');
Route::post('/contact', "BusinessController@store")->name('contact');
Route::post('/sendemail/send', "BusinessController@send");
Route::get('/home', "BusinessController@home")->name('home');
Route::get('/about', "BusinessController@about")->name('about');
Route::get('/blog', "BusinessController@blog")->name('blog');

Route::get('/admin/blog', "BlogController@index")->name('admin.blog');
Route::get('/admin/jsonTable', "BlogController@getJSON")->name('admin.jsonTable');
Route::get('/admin/create', 'BlogController@create')->name('admin.create');
Route::post('/admin/store', "BlogController@store")->name('admin.store');
Route::get('/admin/edit/{id}', 'BlogController@edit')->name('admin.edit');
Route::put('/admin/update/{id}', 'BlogController@update')->name('admin.update');
Route::get('/admin/show/{id}', 'BlogController@show')->name('admin.view');
Route::get('/admin/delete/{id}', 'BlogController@destroy')->name('admin.destroy');

Route::get('/admin/about', "AboutController@index")->name('admin.about');
Route::get('/admin/jsonTeam', "AboutController@getJSON")->name('admin.jsonTeam');
Route::get('/admin/about/create', 'AboutController@create')->name('admin.createAbout');
Route::post('/admin/about/store', "AboutController@store")->name('admin.storeAbout');
Route::get('/admin/about/edit/{id}', 'AboutController@edit')->name('admin.editAbout');
Route::put('/admin/about/update/{id}', 'AboutController@update')->name('admin.updateAbout');
Route::get('/admin/about/show/{id}', 'AboutController@show')->name('admin.viewAbout');
Route::get('/admin/about/delete/{id}', 'AboutController@destroy')->name('admin.destroyAbout');

//Route::get('/blog', 'ContactController@index');
//Route::post('/sendemail/send', 'SendEmailController@send');

Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', function () {
    return view('business_casual');
})->name('home');
//Auth::routes();

Route::get('/unauth', function () {
    return view('unauth');
});

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
