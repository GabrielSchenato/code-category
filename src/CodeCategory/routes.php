<?php

Route::name('admin.')
        ->prefix('admin/')
        ->middleware('web')
        ->middleware('auth')
        ->namespace('CodePress\CodeCategory\Controllers')
        ->group(function () {
            Route::resources([
                'categories' => 'AdminCategoriesController'
            ]);
        });
