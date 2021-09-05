<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $session = Session::get('_tousr');
        if (isset($session)) {
            return view('/home');
        }
        
        return redirect('/login');
    }
}
