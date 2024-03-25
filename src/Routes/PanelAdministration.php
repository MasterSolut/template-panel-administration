<?php

namespace Paneladministration\PanelAdministration\Http\Controllers;

use Illuminate\Support\Facades\Route;

$namespacePrefix = '\\'.config('panel.controllers.namespace').'\\';

Route::group([
    // 'namespace' => $namespacePrefix,
], function () {
    Route::get('/', [AdminPanelController::class, 'index']);
    Route::get('/dashboard', [HomeController::class, 'index']);
    Route::resource('utilisateurs', UtilisateursController::class);
    Route::get('/enable_users/{id}', [UtilisateursController::class, 'enable_users']);
    Route::get('/edit_profile/{id}', [UtilisateursController::class, 'edit_profile'])->name('utilisateurs.edit');
    Route::get('/desable_users/{id}', [UtilisateursController::class, 'desable_users']);
    Route::get('/visible_users/{id}', [UtilisateursController::class, 'visible_users']);

    Route::resource('menus', MenusController::class);
    Route::get('/menus/create', [MenusController::class, 'create']);
    Route::get('/menus/visible/{id}', [MenusController::class, 'visible']);

    Route::resource('sous_menus', SousMenuController::class);
    Route::get('/sous_menus/visible/{id}', [SousMenuController::class, 'visible']);
    Route::get('/sous_menus/list_by/{id}', [SousMenuController::class, 'listBy']);

    Route::resource('type_users', TypeUsersController::class);
    Route::get('/attribuer_type_users/{id}', [TypeUsersController::class], 'type_utilisateur');

    Route::resource('droits', DroitsController::class);
    Route::get('/droits_users/{id}', [UtilisateursController::class, 'droits']);
});
