<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $allPosts = [
            [
                'id' => 1,
                'title' => 'Cupcake Ipsum!',
                'content' => 'Cupcake wafer jelly-o chocolate cake pie chocolate lollipop. Pastry bonbon bonbon brownie apple pie dragée. Croissant I love pastry apple pie macaroon sesame snaps cake. Jujubes I love pudding biscuit marzipan tootsie roll.
                            Donut oat cake I love cupcake croissant. Halvah sesame snaps pie gummies pie lollipop I love sweet. Toffee oat cake halvah oat cake topping powder lollipop.
                            Toffee chocolate bar powder chupa chups jelly donut. Topping I love candy canes bonbon chocolate bar. Bonbon sweet roll brownie I love tiramisu topping halvah gingerbread tootsie roll.
                            Caramels donut tiramisu biscuit sweet jujubes. Cupcake pastry topping macaroon I love I love. Oat cake fruitcake wafer icing sweet I love danish shortbread.
                            Carrot cake gummi bears pastry cookie tootsie roll bear claw bonbon. Danish jujubes sugar plum donut I love I love jelly bonbon. Soufflé sugar plum toffee marshmallow ice cream. Macaroon cake cheesecake marzipan cheesecake soufflé chocolate bar tootsie roll.',
                'posted_by' => 'John Doe',
                'created_at' => '2022-01-25 05:00:00'
            ],
             [
                'id' => 2,
                'title' => 'Hello Laravel!',
                'content' => 'Lemon drops chocolate jelly danish marzipan biscuit fruitcake tootsie roll. Oat cake gingerbread fruitcake tiramisu cake. Gingerbread I love sesame snaps sesame snaps chocolate cake chupa chups caramels chupa chups. Gummi bears soufflé shortbread macaroon cookie icing tiramisu.',
                'posted_by' => 'Jane Doe',
                'created_at' => '2022-01-28 10:05:00'
            ]
        ];

        return view('posts.index', [
            'posts' => $allPosts
        ]);
    }

    public function create() {
        return view('posts.create');
    }

    public function store() {
        return redirect()->route('posts.index');
    }

    public function show($postId) {
        $allPosts = [
            [
                'id' => 1,
                'title' => 'Cupcake Ipsum!',
                'content' => 'Cupcake wafer jelly-o chocolate cake pie chocolate lollipop. Pastry bonbon bonbon brownie apple pie dragée. Croissant I love pastry apple pie macaroon sesame snaps cake. Jujubes I love pudding biscuit marzipan tootsie roll.
                            Donut oat cake I love cupcake croissant. Halvah sesame snaps pie gummies pie lollipop I love sweet. Toffee oat cake halvah oat cake topping powder lollipop.
                            Toffee chocolate bar powder chupa chups jelly donut. Topping I love candy canes bonbon chocolate bar. Bonbon sweet roll brownie I love tiramisu topping halvah gingerbread tootsie roll.
                            Caramels donut tiramisu biscuit sweet jujubes. Cupcake pastry topping macaroon I love I love. Oat cake fruitcake wafer icing sweet I love danish shortbread.
                            Carrot cake gummi bears pastry cookie tootsie roll bear claw bonbon. Danish jujubes sugar plum donut I love I love jelly bonbon. Soufflé sugar plum toffee marshmallow ice cream. Macaroon cake cheesecake marzipan cheesecake soufflé chocolate bar tootsie roll.',
                'posted_by' => 'John Doe',
                'created_at' => '2022-01-25 05:00:00'
            ],
             [
                'id' => 2,
                'title' => 'Hello Laravel!',
                'content' => 'Lemon drops chocolate jelly danish marzipan biscuit fruitcake tootsie roll. Oat cake gingerbread fruitcake tiramisu cake. Gingerbread I love sesame snaps sesame snaps chocolate cake chupa chups caramels chupa chups. Gummi bears soufflé shortbread macaroon cookie icing tiramisu.',
                'posted_by' => 'Jane Doe',
                'created_at' => '2022-01-28 10:05:00'
            ]
        ];

        $selectedPost = '';

        foreach($allPosts as $post) {
            if($post['id'] == $postId) {
                $selectedPost = $post;
            }
        }

        return view('posts.show', [
            'post' => $selectedPost
        ]);
    }

    public function edit($postId) {
        $allPosts = [
            [
                'id' => 1,
                'title' => 'Cupcake Ipsum!',
                'content' => 'Cupcake wafer jelly-o chocolate cake pie chocolate lollipop. Pastry bonbon bonbon brownie apple pie dragée. Croissant I love pastry apple pie macaroon sesame snaps cake. Jujubes I love pudding biscuit marzipan tootsie roll.
                            Donut oat cake I love cupcake croissant. Halvah sesame snaps pie gummies pie lollipop I love sweet. Toffee oat cake halvah oat cake topping powder lollipop.
                            Toffee chocolate bar powder chupa chups jelly donut. Topping I love candy canes bonbon chocolate bar. Bonbon sweet roll brownie I love tiramisu topping halvah gingerbread tootsie roll.
                            Caramels donut tiramisu biscuit sweet jujubes. Cupcake pastry topping macaroon I love I love. Oat cake fruitcake wafer icing sweet I love danish shortbread.
                            Carrot cake gummi bears pastry cookie tootsie roll bear claw bonbon. Danish jujubes sugar plum donut I love I love jelly bonbon. Soufflé sugar plum toffee marshmallow ice cream. Macaroon cake cheesecake marzipan cheesecake soufflé chocolate bar tootsie roll.',
                'posted_by' => 'John Doe',
                'created_at' => '2022-01-25 05:00:00'
            ],
             [
                'id' => 2,
                'title' => 'Hello Laravel!',
                'content' => 'Lemon drops chocolate jelly danish marzipan biscuit fruitcake tootsie roll. Oat cake gingerbread fruitcake tiramisu cake. Gingerbread I love sesame snaps sesame snaps chocolate cake chupa chups caramels chupa chups. Gummi bears soufflé shortbread macaroon cookie icing tiramisu.',
                'posted_by' => 'Jane Doe',
                'created_at' => '2022-01-28 10:05:00'
            ]
        ];

        $selectedPost = '';

        foreach($allPosts as $post) {
            if($post['id'] == $postId) {
                $selectedPost = $post;
            }
        }

        return view('posts.edit', [
            'post' => $selectedPost
        ]);
    }

    public function update($postId) {
        return redirect()->route('posts.index');
    }

    public function destroy($postId) {
        return "deleted";
        // return redirect()->route('posts.index');
    }
}