<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('species', 'SpeciesCrudController');
    Route::crud('animal', 'AnimalCrudController');
    Route::crud('location', 'LocationCrudController');
    Route::crud('animal_owner', 'Animal_ownerCrudController');
    Route::crud('address', 'AddressCrudController');
    Route::crud('timeline', 'TimelineCrudController');
    Route::crud('operation', 'OperationCrudController');
}); // this should be the absolute last line of this file