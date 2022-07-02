<?php

include "helpers.php";
include "classes/Auth.php";

if(isset($_COOKIE['token'])) {
    if (!Auth::check()) {
        setcookie('token', null, time()+0, '/');
        header('Location: /');
    }

    $products = [
        [
            'id' => 1,
            'title' => 'iphone',
        ],
        [
            'id' => 2,
            'title' => 'samsung',
        ]
    ];

    view('templates/products', ['products' => $products, 'user' => Auth::user()]);
} else {
    view('templates/login');
}