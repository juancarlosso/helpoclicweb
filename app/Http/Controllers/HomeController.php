<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cuenta;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usuarios = User::count();
        //$cuentas = Cuenta::count();
        return view('home')
            ->with('usuarios', $usuarios);
        //    ->with('cuentas',$cuentas);
    }
}
