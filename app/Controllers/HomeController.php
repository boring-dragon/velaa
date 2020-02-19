<?php
namespace App\Controllers;

use Velaa\Core\Container;

class HomeController
{
    public function index()
    {
        //$request = Container::get('request');

        //$request->get('name');

        $db = Container::get('database');
        $names = $db->all('users');
        $shihaam = $db->where('users','id',2);

        $data = [
            'users' => $names,
            'site' => 'jinas.me',
            'user' => $shihaam
        ];

        jsonify($data, 'asdsd');
    }

    public function getposts()
    {
        $db = Container::get('database');

        $posts = $db->all('posts');

        jsonify($posts, 'post received successfully!');
    }

    public function addPost()
    {
        $faker = \Faker\Factory::create();
        $db = Container::get('database');
        $data = [
            'title' => $faker->sentence,
            'body' => $faker->paragraph
        ];
        $db->insert('posts',$data);

        jsonify($data, 'data inserted!');
    }
}
