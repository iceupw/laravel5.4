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

/*Route::get('/', function () {
    //return view('welcome');
})->name('welcome');*/

Route::group(['prefix' => 'crm', 'namespace'=> 'Crm'], function () {
    Route::get('/project/log', ['uses' => 'ProjectLogController@index']);
});

Route::group(['prefix' => 'base', 'namespace'=> 'Base'], function () {
    Route::get('/fileupload', ['uses' => 'FileUploadController@index']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function(){
    // open an image file
    $img = Image::make('./test1.png');

    // now you are able to resize the instance
    $img->resize(320, 240);

    // and insert a watermark for example
    $img->insert('test2.png');

    // finally we save the image as a new file
    $img->save('bar.jpg');
    return $img->response('jpg');
});
