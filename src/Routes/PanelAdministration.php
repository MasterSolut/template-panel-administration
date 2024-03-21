<?php

<<<<<<< HEAD
namespace Paneladministration\PanelAdministration\Http\Controllers;

use  Illuminate\Support\Facades\Route;

=======
namespace Paneladministration\PanelAdministration;

use Illuminate\Support\Facades\Route;
use Paneladministration\PanelAdministration\Http\Controllers\AdminPanelController;
use Paneladministration\PanelAdministration\Http\Controllers\DroitsController;
use Paneladministration\PanelAdministration\Http\Controllers\HomeController;
use Paneladministration\PanelAdministration\Http\Controllers\MenusController;
use Paneladministration\PanelAdministration\Http\Controllers\SousMenuController;
use Paneladministration\PanelAdministration\Http\Controllers\UtilisateursController;
>>>>>>> de7f6d040d8de480e1a369abab1e66dd2f0b2ee6

$namespacePrefix = '\\'.config('panel.controllers.namespace').'\\';

Route::group([
    'namespace' => $namespacePrefix,
], function () {
    Route::get('/', [AdminPanelController::class, 'index']);
    Route::get('/dashboard', [HomeController::class]);
    Route::resource('/utilisateurs', UtilisateursController::class);
    Route::get('/enable_users/{id}', [UtilisateursController::class, 'enable_users']);
    Route::get('/edit_profile/{id}', [UtilisateursController::class, 'edit_profile']);
    Route::get('/desable_users/{id}', [UtilisateursController::class, 'desable_users']);
    Route::get('/visible_users/{id}', [UtilisateursController::class, 'visible_users']);

    Route::resource('/menus', MenusController::class);
    Route::get('/menus/visible/{id}', [MenusController::class, 'visible']);

    Route::resource('/sous_menus', SousMenuController::class);
    Route::get('/sous_menus/visible/{id}', [SousMenuController::class, 'visible']);
    Route::get('/sous_menus/list_by/{id}', [SousMenuController::class, 'listBy']);

    Route::resource('/droits', DroitsController::class);
    Route::get('/droits_users/{id}', [UtilisateursController::class, 'droits']);
});
