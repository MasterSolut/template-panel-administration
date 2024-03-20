<?php

namespace Paneladministration\PanelAdministration\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function index()
    {
        return "Welcome to our homepage";
    }
}
