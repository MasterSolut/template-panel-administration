<?php


namespace Paneladministration\PanelAdministration;

use Illuminate\Routing\Controller;

class AdminPanelController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('home');
    }
}
