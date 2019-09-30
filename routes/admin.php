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
    Route::get('/manage-users', 'Admin\AdminController@showManageUsersPage')->name('manage_users');
    Route::get('/view-users/{user}', 'Admin\AdminController@viewUserPage')->name('view_user');

    Route::put('/profile/{shop}', 'User\ShopController@updateShopProfile')->name('user_profile.update');
    Route::delete('/user/{user}', 'Admin\AdminController@userDestroy')->name('user.destroy');
});

