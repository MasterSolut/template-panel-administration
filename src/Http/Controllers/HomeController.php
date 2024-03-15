<?php

namespace Paneladministration\PanelAdministration\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        return 'Welcome to our homepage';
    }
}
