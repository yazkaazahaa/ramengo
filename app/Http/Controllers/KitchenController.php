<?php

namespace App\Http\Controllers;

class KitchenController extends Controller
{
    public function index()
    {
        return view('kitchen.index');
    }
}