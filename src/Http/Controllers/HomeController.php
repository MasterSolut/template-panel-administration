<?php

namespace Paneladministration\PanelAdministration\Http\Controllers;

use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('PanelAdministration::templates/base');
    }
}
