<?php

namespace Paneladministration\PanelAdministration\Http\Controllers;

use Illuminate\Routing\Controller;
use Paneladministration\PanelAdministration\Facades\PanelAdministration;

class AdminPanelController extends Controller
{
    public function index()
    {
        return PanelAdministration::view('PanelAdministration::home');
    }
}
