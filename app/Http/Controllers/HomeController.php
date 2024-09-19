<?php

namespace App\Http\Controllers;

use App\Http\Controllers\catalog\CatalogController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() // muestra el home generico
    {
        return redirect()->action([CatalogController::class, 'getIndex']);
    }

    public function getHome()
    {
        return redirect()->route('login');
    }
}
