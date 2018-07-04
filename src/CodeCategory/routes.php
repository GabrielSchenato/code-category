<?php

Route::name('admin.')
        ->prefix('admin/')
        ->namespace('CodePress\CodeCategory\Controllers')
        ->group(function () {
            Route::resources([
                'categories' => 'AdminCategoriesController'
            ]);
        });
