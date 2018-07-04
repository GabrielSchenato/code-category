<?php

Route::name('admin.')
        ->prefix('admin/')
        ->middleware('web')
        ->namespace('CodePress\CodeCategory\Controllers')
        ->group(function () {
            Route::resources([
                'categories' => 'AdminCategoriesController'
            ]);
        });
