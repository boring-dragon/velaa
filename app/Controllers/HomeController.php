<?php
namespace App\Controllers;

use Velaa\Core\Container;

class HomeController
{
    public function index()
    {
        $request = Container::get('request');

        //$request->get('name');

        $data = [
            'dummy data' => $names = [
                'Jinas',
                'shihaam',
                'dhaaris'
            ],
            'site' => 'jinas.me'
        ];

        jsonify($data, 'asdsd');
    }
}
