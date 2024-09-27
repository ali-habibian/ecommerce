<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    public function home()
    {
        if (auth()->user()->hasRole('super admin')) {
            return view('admin.home.index');
        }

        return view('home.index');
    }

    /**
     * Display the application home page.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('home.index');
    }
}
