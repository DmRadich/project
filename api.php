<?php

include 'classes/Auth.php';

if($_SERVER['REQUEST_METHOD'] !=='POST') {
    return false;
}

$body = file_get_contents('php://input');
$body = json_decode($body, true);

$user = Auth::checkIfUserExist($body['login'], $body['password']);

if ($user) {
    Auth::login($user['id']);

} else {
    echo 'false';
}

echo 'true';