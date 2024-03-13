<?php


namespace Paneladministration\PanelAdministration;

use Paneladministration\PanelAdministration\DroitsController;

use  Illuminate\Support\Facades\Route;
use utilisateursController;

Route::get('/',  AdminPanelController::class);
Route::get('/dashboard', HomeController::class);
Route::resource('utilisateurs', utilisateursController::class);
Route::get('enable_users/{id}', [UtilisateursController::class, 'enable_users']);
Route::get('edit_profile/{id}', [UtilisateursController::class, 'edit_profile']);
Route::get('desable_users/{id}', [UtilisateursController::class, 'desable_users']);
Route::get('visible_users/{id}', [UtilisateursController::class, 'visible_users']);


Route::resource('menus', MenuController::class);
Route::get('menus/visible/{id}', [MenuController::class, 'visible']);

Route::resource('sous_menus', [SousMenusController::class]);
Route::get('sous_menus/visible/{id}', [SousMenusController::class, 'visible']);
Route::get('sous_menus/list_by/{id}', [SousMenusController::class, 'listBy']);


Route::resource('droits', DroitsController::class);
Route::get('droits_users/{id}',  [utilisateursController::class, 'droits']);
