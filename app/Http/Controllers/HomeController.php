<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
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
