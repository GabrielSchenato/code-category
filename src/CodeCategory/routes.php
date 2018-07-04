<?php

Route::prefix('admin/categories')
        ->namespace('CodePress\CodeCategory\Controllers')
        ->group(function () {
            Route::get('', 'AdminCategoriesController@index');
        });
