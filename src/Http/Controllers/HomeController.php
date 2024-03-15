<?php

namespace Paneladministration\PanelAdministration\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function __invoke(Request $request)
    {
        return "Welcome to our homepage";
    }
}
