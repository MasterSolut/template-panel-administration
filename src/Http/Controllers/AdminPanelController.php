<?php

namespace Paneladministration\PanelAdministration;

use Illuminate\Routing\Controller;

class AdminPanelController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
}
