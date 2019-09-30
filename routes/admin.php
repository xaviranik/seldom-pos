<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.home');
})->name('home');

Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('/home', 'Admin\AdminController@showAdminDashboardPage')->name('home');

    Route::get('/manage-users', 'Admin\ManageUserController@index')->name('manage_users');
    Route::get('/view-users/{user}', 'Admin\ManageUserController@userView')->name('view_user');

    Route::put('/user/profile/{shop}', 'User\ShopController@updateShopProfile')->name('user_profile.update');
    Route::delete('/user/{user}', 'Admin\ManageUserController@userDestroy')->name('user.destroy');
});

