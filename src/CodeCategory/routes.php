<?php

Route::prefix('categories')
        ->namespace('CodePress\CodeCategory\Controllers')
        ->group(function () {
            Route::get('test', 'AdminCategoriesController@index');
        });
