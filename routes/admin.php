<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.home');
})->name('home');

Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('/manage-users', 'Admin\AdminController@showManageUsersPage')->name('manage_users');

});

