<?php

Route::name('admin.')
        ->prefix('admin/')
        ->middleware('web', 'auth')
        ->namespace('CodePress\CodeCategory\Controllers')
        ->group(function () {
            Route::get('categories/deleted', 'AdminCategoriesController@deleted')->name('categories.deleted');
            Route::get('categories/deleted/restore/{post}', 'AdminCategoriesController@restore')->name('categories.restore');
            Route::resources([
                'categories' => 'AdminCategoriesController'
            ]);
        });
