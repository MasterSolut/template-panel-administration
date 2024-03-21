<?php

namespace Paneladministration\PanelAdministration\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
<<<<<<< HEAD


    public function index()
=======
    public function __invoke(Request $request)
>>>>>>> de7f6d040d8de480e1a369abab1e66dd2f0b2ee6
    {
        return 'Welcome to our homepage';
    }
}
