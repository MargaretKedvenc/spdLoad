<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/products')->group(function () {
    Route::get('/', 'ProductController@index');
    Route::get('/{id}', 'ProductController@show')->where(['id' => '[0-9]+']);
    Route::post('/', 'ProductController@create');
    Route::delete('/{id}', 'ProductController@delete')->where(['id' => '[0-9]+']);
    Route::patch('/{id}', 'ProductController@update')->where(['id' => '[0-9]+']);
});

Route::post('/orders', 'OrderController@create');

// Another way to realize api routes
// GET /products/{id}/feedbacks
// POST /products/{id}/feedbacks

Route::prefix('/feedbacks')->group(function () {
    Route::get('/', 'FeedbackController@index');
    Route::post('/', 'FeedbackController@create');
    Route::post('/{id}/likes', 'FeedbackController@like')->where(['id' => '[0-9]+']);
    Route::delete('/{id}/likes', 'FeedbackController@unlike')->where(['id' => '[0-9]+']);
});

Route::put('/wishlist', 'WishlistController@update');

Route::post('/payments', 'PaymentController@create');

