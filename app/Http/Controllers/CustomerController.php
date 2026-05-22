<?php

namespace App\Http\Controllers;

use App\Models\Menu;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.home');
    }

    public function menu()
    {
        $menus = Menu::all();

        return view('customer.menu', compact('menus'));
    }
}