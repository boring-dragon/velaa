<?php
namespace App\Controllers;

use Velaa\Core\Container;
use App\Models\Post;

class PostsController extends Controller
{
    public function getposts()
    {
        $request = Container::get('request');
        $db = Container::get('database');
        $db->stats_enabled = true;

       /*  $field = $request->query->get('sort');
        if($request->query->get('sort'))
        {
            //$query = "SELECT * FROM `posts` ORDER BY '$field' ASC";
            $posts = $db->from('posts')->sortASC($field)->get();
        } */


        //$db->using(Post::class);

        //$posts = $db->find(7);
        
        //$postcollection = Container::get('collection');

        $posts = $db->from('posts')->get();

        /* $postcollection->set($posts);

        dd($postcollection->latest()); */

        //Counts
        $postscount = $db->from('posts')->count();

        //Where with conditions
        //$posts = $db->from('posts')->where('id >', 5)->get();

        //Sort multiple fields
        // sortAsc
        //$posts = $db->from('posts')->sortDesc(array('id','title'))->get();

        //Sort a single field
        //$posts = $db->from('posts')->sortDesc('id')->get();

        // Raw queries
        //$posts = $db->sql('SELECT * FROM posts')->get();

        //Select specific fields
        //$posts = $db->from('posts')->select(array('id','title'))->get();

        // Select limited amount from table.
        //$posts = $db->from('posts')->limit(5)->offset(0)->get();

        // Passing addtional param to select with limit and offset
        //$posts = $db->from('posts')->select('*',3,0)->get();


        //jsonifyError('error occured', 401);
        //jsonify($posts, 'post received successfully!');

        /*  $collection = Container::get('collection');

         $collection->setData($posts);
         dd($collection->getData()); */


        $array = [
            'posts' => $posts,
            'meta' => [
                'postscount' => $postscount
            ]
        ];

        $this->logger("posts", "posts retrieved successfuly!");

        $db->logStats();

        jsonify($array);
    }

    

    public function addPost()
    {
        $request = Container::get('request');
        

        $title = $request->get('title');
        $body = $request->get('body');

        $db = Container::get('database');

        $validator = Container::get('validator');

        $db->stats_enabled = true;

        $validation = $validator->validate($request->request->all(), [
            'title' => 'required',
            'body' => 'required']
        );

        if ($validation->fails()) {
            $errors = $validation->errors();
            sendJson($errors->toArray());
            exit;
        }

        $posts = [
            'title' => $title,
            'body' => $body
        ];
        $db->from('posts')->insert($posts)->execute();

        $db->logStats();

        jsonify($posts, 'posts created!');
    }

    public function postFactory()
    {
        $faker = Container::get('faker');
        $db = Container::get('database');

        $posts = [
            'title' => $faker->sentence,
            'body' => $faker->paragraph
        ];
        $db->from('posts')->insert($posts)->execute();

        $db->logStats();

        jsonify($posts, 'posts created!');


    }

    public function test()
    {
        
    }
}
