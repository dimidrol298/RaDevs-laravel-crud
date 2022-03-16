<?php

namespace App\Http\Controllers;

class StaterkitController extends Controller
{
    // home
    public function home(): \Illuminate\Contracts\View\View
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Index"]
        ];
        return view('/content/home', ['breadcrumbs' => $breadcrumbs]);
    }
}
