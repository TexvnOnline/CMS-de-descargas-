<?php



Route::get('/populares','WebController@popular')->name('web.popular');

Route::get('/todos-los-archivos','WebController@all')->name('web.all');

Route::get('/','WebController@index')->name('web.index');
// EN PROCESO AHORA
Route::get('/item/{category}','WebController@categories')->name('web.categories');
// YA ESTA SUBCATEGORIAS
Route::get('/item/{category}/{subcategory}','WebController@subcategories')->name('web.subcategories');
// EN PROCESO
Route::get('/articulo/{item}','WebController@single')->name('web.single');
//EN PROCESO
Route::get('/etiqueta/{tag}', 'WebController@tag' )->name('web.tag');
// BUSQUEDA
Route::get('/resultado', 'WebController@search' )->name('web.search');


Route::resource('/subscribe', 'MailController',['only'=>['store']])->names('subscribe');

Route::group(['prefix' => 'admin'], function() {
    Route::resource('/categories', 'CategoryController')->names('categories');
    Route::resource('/tags', 'TagController')->names('tags');
    Route::resource('/subcategories', 'SubcategoryController')->names('subcategories');
    Route::resource('/articles', 'ArticleController')->names('articles');
    Route::resource('/cover', 'CoverController')->names('covers');
    Route::get('/', 'AdminController@admin')->name('admin');
    Route::resource('/socials', 'SocialController')->names('socials');
    Route::resource('/links', 'LinkController')->names('links');
    Route::resource('/donations', 'DonationController')->names('donations');
    Route::resource('/roles', 'RoleController')->names('roles');
    Route::resource('/users', 'UserController')->names('users');
    Route::get('/pending', 'ArticleController@pending')->name('articles.pending');    
    Route::get('/all', 'ArticleController@all')->name('articles.all');  
});

Auth::routes();
//Auth::routes(["register" => false]);

Route::get('/home', 'HomeController@index')->name('home');
