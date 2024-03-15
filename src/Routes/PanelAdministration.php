<?php

namespace Paneladministration\PanelAdministration;

<<<<<<< HEAD

use Paneladministration\PanelAdministration\Http\Controllers\HomeController;
use Paneladministration\PanelAdministration\Http\Controllers\UtilisateursController;
use Paneladministration\PanelAdministration\Http\Controllers\MenusController;
use Paneladministration\PanelAdministration\Http\Controllers\AdminPanelController;
use Paneladministration\PanelAdministration\Http\Controllers\SousMenuController;

use  Illuminate\Support\Facades\Route;
use Paneladministration\PanelAdministration\Http\Controllers\DroitsController;

$namespacePrefix = '\\' . config('panel.controllers.namespace') . '\\';


=======
use Illuminate\Support\Facades\Route;
use UtilisateursController;

Route::get('/', [AdminPanelController::class]);
Route::get('/dashboard', [HomeController::class]);
Route::resource('/utilisateurs', [UtilisateursController::class]);
Route::get('/enable_users/{id}', [UtilisateursController::class, 'enable_users']);
Route::get('/edit_profile/{id}', [UtilisateursController::class, 'edit_profile']);
Route::get('/desable_users/{id}', [UtilisateursController::class, 'desable_users']);
Route::get('/visible_users/{id}', [UtilisateursController::class, 'visible_users']);

Route::resource('/menus', [MenuController::class]);
Route::get('menus/visible/{id}', [MenuController::class, 'visible']);
>>>>>>> beb851ade8fcc364ef5806fcd18b627298aaf044

Route::group([
    'namespace' => $namespacePrefix,
], function () {
    Route::get('/dashboard', [HomeController::class]);
    Route::get('/', [AdminPanelController::class]);
    Route::get('/dashboard', [HomeController::class]);
    Route::resource('/utilisateurs', UtilisateursController::class);
    Route::get('/enable_users/{id}', [UtilisateursController::class, 'enable_users']);
    Route::get('/edit_profile/{id}', [UtilisateursController::class, 'edit_profile']);
    Route::get('/desable_users/{id}', [UtilisateursController::class, 'desable_users']);
    Route::get('/visible_users/{id}', [UtilisateursController::class, 'visible_users']);

<<<<<<< HEAD
    Route::resource('/menus', MenusController::class);
    Route::get('/menus/visible/{id}', [MenusController::class, 'visible']);

    Route::resource('/sous_menus', SousMenuController::class);
    Route::get('/sous_menus/visible/{id}', [SousMenuController::class, 'visible']);
    Route::get('/sous_menus/list_by/{id}', [SousMenuController::class, 'listBy']);

    Route::resource('/droits', DroitsController::class);
    Route::get('/droits_users/{id}', [UtilisateursController::class, 'droits']);
});
=======
Route::resource('/droits', [DroitsController::class]);
Route::get('/droits_users/{id}', [UtilisateursController::class, 'droits']);
>>>>>>> beb851ade8fcc364ef5806fcd18b627298aaf044
