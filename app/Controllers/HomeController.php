<?php
namespace App\Controllers;

use Velaa\Core\Container;

class HomeController extends Controller
{
    public function index()
    {
        //$request = Container::get('request');

        //$request->get('name');

        $db = Container::get('database');
        $names = $db->from('users')->get();
        $shihaam = $db->from('users')->where('id', 2)->one();

        $data = [
            'users' => $names,
            'user' => $shihaam,
            'memory_used' => mem_usage() . "KB"
        ];

        jsonify($data);
    }
}
