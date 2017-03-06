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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'IndexController@index');
Route::get('/posts/', 'IndexController@searchBlog');
Route::get('/posts/tag/', 'IndexController@searchBlogByTags');

// Show Post
Route::get('/post/{id}', 'IndexController@show');

// Comment
Route::post('/comment/store', 'CommentsController@store');
Route::delete('/comment/{id}/delete', 'CommentsController@destroy');
Route::get('comments/{id}', 'CommentsController@lists');

// Like
Route::post('/post/like', 'LikeController@Like');
Route::delete('/post/unlike/{id}', 'LikeController@UnLike');
Route::get('likes/{id}', 'LikeController@Likes');
Route::get('/user/name/{id}', 'LikeController@UsersName');

// Reply
Route::post('/reply/store', 'ReplyController@store');
Route::delete('/reply/{id}/delete', 'ReplyController@destroy');
Route::get('replies/{id}', 'ReplyController@lists');

// Profile
Route::get('/profile/{id}','ProfileController@show');
Route::get('/profile/{id}/edit','ProfileController@edit');
Route::post('/profile/update_avatar','ProfileController@update_avatar');
Route::put('/profile/{id}/update','ProfileController@update');
Route::put('/profile/{id}/change_password','ProfileController@change_password');
Route::get('/user/avatar/{id}', 'ProfileController@UsersAvatar');
Route::get('/user/data/{id}','ProfileController@data');
Route::get('/user/data/activity/{id}','ProfileController@user_comments_activity');

// User Routes
Auth::routes();

// Overview
Route::get('/admin/overview', 'AdminController@index');

// Post
Route::get('/admin/posts', 'PostsController@index');
Route::get('/admin/posts/create', 'PostsController@create');
Route::get('/admin/posts/{id}/edit', 'PostsController@edit');
Route::post('/admin/posts/store', 'PostsController@store');
Route::put('/admin/posts/{id}/update/', 'PostsController@update');
Route::delete('/admin/posts/{id}/delete/', 'PostsController@destroy');
Route::get('/admin/posts/{id}/show/', 'PostsController@show');
Route::get('/admin/posts/my_post/', 'PostsController@my_post');

// Users
Route::get('/admin/users', 'UsersController@index');
Route::get('/admin/users/{id}/show/', 'UsersController@show');

// Admin Login
Route::get('/admin/','AdminAuth\LoginController@redirectToAdminLogin');
Route::get('/admin/login','AdminAuth\LoginController@showLoginForm');
Route::post('/admin/login','AdminAuth\LoginController@login');
Route::post('/admin/logout','AdminAuth\LoginController@logout');

// Admin Forgot Password
Route::post('/admin/password/email','AdminAuth\ForgotPasswordController@sendResetLinkEmail');
Route::get('/admin/password/reset' ,'AdminAuth\ForgotPasswordController@showLinkRequestForm');
Route::post('/admin/password/reset' ,'AdminAuth\ResetPasswordController@reset');
Route::get( '/admin/password/reset/{token}' ,'AdminAuth\ResetPasswordController@showResetForm');

// Admin Register
Route::get('/admin/register' ,'AdminAuth\RegisterController@showRegistrationForm');
Route::post('/admin/register' ,'AdminAuth\RegisterController@register');
Route::get('/home', 'HomeController@index');