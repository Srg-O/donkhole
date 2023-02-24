<?php
use Illuminate\Support\Facades\Route;

//入力ページ
Route::get('/', 'App\Http\Controllers\FormController@index')->name('form.index');
Route::post('/', 'App\Http\Controllers\FormController@post')->name("form.post");

//確認ページ
Route::get('/confirm', 'App\Http\Controllers\FormController@confirm')->name('form.confirm');

//送信完了ページ
Route::post('/send', 'App\Http\Controllers\FormController@send')->name('form.send');
Route::get('/thanks', 'App\Http\Controllers\FormController@thanks')->name('form.thanks');

//管理画面
Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');
Route::get('/admin/detail', [App\Http\Controllers\HomeController::class, 'detail'])->name('admin.list');
Route::get('/admin/delete', [App\Http\Controllers\HomeController::class, 'delete'])->name('admin.delete');
