<?php

Route::prefix('categories')
        ->group(function () {
            Route::get('test', function () {
                return "Test";
            });
        });
