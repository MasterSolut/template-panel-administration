<?php

namespace Paneladministration\PanelAdministration\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Paneladministration\PanelAdministration\Facades\PanelAdministration;
use Paneladministration\PanelAdministration\Models\Menu;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;



class MenusController extends Controller
{
    public function index()
    {
        $menus = DB::table('menus')->where('visible_menus', '=', '1')->orderBy('indice_menus', 'asc')->get();

        return PanelAdministration::view('PanelAdministration::parametrage.menus.menus_liste', compact('menus'));
    }

    public function create()
    {
        return PanelAdministration::view('PanelAdministration::parametrage.menus.menus_form');
    }
    public function store(Request $request)
    {
        $this->validate($request, [Menu::rules(), Menu::messages()]);
        $menus = new Menu();
        $menus->titre_menus = $request->titre_menus;
        $menus->libelle_menus = $request->libelle_menus;
        $menus->lien_menus = $request->lien_menus;
        $menus->indice_menus = $request->indice_menus;
        $menus->publier_menus = $request->publier_menus;
        $menus->save();
        $msg = "Enregistrement effectué avec succès !";
        Session::flash('flash_message', $msg);
        return redirect()->back();
    }

    public function edit($id)
    {
        $menus = Menu::find($id);

        return PanelAdministration::view('PanelAdministration::parametrage.menus.menus_form', compact('menus'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, Menu::rules(), Menu::messages());
        $menus = Menu::find($id);
        $menus->titre_menus = $request->titre_menus;
        $menus->libelle_menus = $request->libelle_menus;
        $menus->lien_menus = $request->lien_menus;
        $menus->indice_menus = $request->indice_menus;
        $menus->publier_menus = $request->publier_menus;
        $menus->save();

        return redirect()->back();
    }

    public function visible($id)
    {
        $menus = Menu::find($id);
        $menus->visible_menus = 0;
        $menus->save();

        return redirect()->route('menus.index');
    }
}
