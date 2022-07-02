<?php

$db = new mysqli('localhost', 'root', '', 'project1');

$db->query('CREATE TABLE users (id int primary key auto_increment, login varchar(190), password varchar(190))');
$db->query('CREATE TABLE `users_token` (id int primary key auto_increment, user_id int, token varchar(190))');

$db->query("INSERT INTO `users` (login, password) VALUES ('dima', 'dima')");