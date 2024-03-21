<?php

namespace Paneladministration\PanelAdministration\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{


    public function index()
    {
        return 'Welcome to our homepage';
    }
}
