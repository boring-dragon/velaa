<?php

namespace App\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        jsonify('hello');
    }
}
