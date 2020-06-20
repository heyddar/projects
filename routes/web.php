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


//front
Auth::routes(['verify' => true]);

//login with github
Route::get('login/github', 'Auth\LoginController@redirectToProvider')->name('github');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('sitemap.xml','SitemapController@sitemap');
Route::get('sitemap-static.xml','SitemapController@statics');
Route::get('sitemap-category.xml','SitemapController@category');
Route::get('sitemap-post.xml','SitemapController@post');
//
Route::group(['namespace'=>'Front'], function () {
    //home
    Route::get('/', 'HomeController@index')->name('home');
   //home
    Route::get('/sendmail', 'HomeController@invoice');

    //update user
    Route::put('/user/update', 'UserController@update')->name('user.update');

    //show product
    Route::get('/product/{id}/{name}', 'ProductController@show')->name('product.show');

    //products
    Route::get('/products', 'ProductController@index')->name('product.index');

    //posts
    Route::resource('/post', 'PostController');

    //group-posts
    Route::get('/group/{id}/{title}', 'PostController@group_index')->name('groups');

    //tag-posts
    Route::get('/tag/{id}/{title}', 'PostController@tag_index')->name('tags');

    //author-posts
    Route::get('/author/{id}/{title}', 'PostController@author_index')->name('author');

    //comment-posts
    Route::post('/comment', 'CommentController@store')->name('comment.store');

    //likes
    Route::get('dislike/{id}', 'PostController@dislike')->name('post.dislike');
    Route::get('like/{id}', 'PostController@like')->name('post.like');

    //cart
    Route::post('cart/add', 'CartController@add')->name('cart.add');
    Route::get('cart/checkout-step-1', 'CartController@step1')->name('checkout-step-1');
    Route::get('cart/checkout-step-2', 'CartController@step2')->name('checkout-step-2');
    Route::post('cart/checkout-step-3', 'CartController@step3')->name('checkout-step-3');
    Route::post('cart/payment', 'CartController@payment')->name('payment');
    Route::get('payment/done', 'CartController@callback');

    //rating
    Route::get('rating/{product_id}/{star}', 'ProductController@rating')->name('rating');

   //copon
    Route::get('copon', 'ProductController@coponcode')->name('copon');





});

//admin
Route::group([
    'middleware'=>'auth',
    'namespace'=>'Admin','prefix'=>'dashboard','as'=>'admin.'], function () {
    Route::get('/', 'AdminController@index')->name('dashboard');
    //users
    Route::resource('/user','UserController');
    Route::get('/user-delete/{id}', 'UserController@delete')->name('user.delete');

    //categories
    Route::get('/category-delete/{id}', 'CategoryController@delete')->name('category.delete');
    Route::resource('/category','CategoryController');

    //brands
    Route::get('/brand-delete/{id}', 'BrandController@delete')->name('brand.delete');
    Route::resource('/brand','BrandController');

    //sizes
    Route::get('/size-delete/{id}', 'SizeController@delete')->name('size.delete');
    Route::resource('/size','SizeController');

    //colors
    Route::get('/color-delete/{id}', 'ColorController@delete')->name('color.delete');
    Route::resource('/color','ColorController');

    //products
    Route::get('/product-delete/{id}', 'ProductController@delete')->name('product.delete');
    Route::resource('/product','ProductController');

    //roles
    Route::get('/role-delete/{id}', 'RoleController@delete')->name('role.delete');
    Route::resource('/role','RoleController');

    //permissions
    Route::get('/permission-delete/{id}', 'PermissionController@delete')->name('permission.delete');
    Route::resource('/permission','PermissionController')->middleware('permission:users');

    //posts
    Route::get('/post-delete/{id}', 'PostController@delete')->name('post.delete');
    Route::resource('/post','PostController');

    //groups
    Route::get('/group-delete/{id}', 'GroupController@delete')->name('group.delete');
    Route::resource('/group','GroupController');

    //groups
    Route::get('/tag-delete/{id}', 'TagController@delete')->name('tag.delete');
    Route::resource('/tag','TagController');

    //comments
    Route::get('/comment-delete/{id}', 'CommentController@delete')->name('comment.delete');
    Route::resource('/comment','CommentController');

});