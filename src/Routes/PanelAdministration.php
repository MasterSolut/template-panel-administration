<?php


<<<<<<< HEAD
namespace Paneladministration\PanelAdministration;

use Paneladministration\PanelAdministration\DroitsController;
use Paneladministration\PanelAdministration\AdminPanelController;
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
=======
Route::get('/', ['uses' => 'Homecontroller']);
Route::get('/dashboard', ['uses' => 'Homecontroller']);
Route::resource('utilisateurs', ['UtilisateursControllers']);
Route::get('enable_users/{id}', ['uses' => 'UtilisateursController@enable_users']);
Route::get('edit_profile/{id}', ['uses' => 'UtilisateursController@edit_profile']);
Route::get('desable_users/{id}', ['uses' => 'UtilisateursController@desable_users']);
Route::get('visible_users/{id}', ['uses' => 'UtilisateursController@visible_users']);

Route::resource('menus', ['uses' => 'MenusController']);
Route::get('menus/visible/{id}', ['uses' => 'MenusController@visible']);
>>>>>>> 44a16a6fe160a270557b5d3ebf936f3b724187d2

Route::resource('sous_menus', [SousMenusController::class]);
Route::get('sous_menus/visible/{id}', [SousMenusController::class, 'visible']);
Route::get('sous_menus/list_by/{id}', [SousMenusController::class, 'listBy']);

<<<<<<< HEAD

Route::resource('droits', DroitsController::class);
Route::get('droits_users/{id}',  [utilisateursController::class, 'droits']);
=======
Route::resource('droits', ['uses' => 'DroitsController']);
Route::get('droits_users/{id}', ['uses' => 'utilisateursController@droits']);
>>>>>>> 44a16a6fe160a270557b5d3ebf936f3b724187d2
