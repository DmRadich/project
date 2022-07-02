<?php

class Auth
{
    public static function checkIfUserExist(string $login, string $password): ?array
    {
        $db = new mysqli('localhost', 'root', '', 'project1');

        $user = $db->query("SELECT * FROM `users` WHERE `login` = '" . $login. "' AND `password` = '" . $password . "'");

        if ($user->num_rows === 0) {
            return null;
        } else {
            return $user->fetch_assoc();
        }

    }

    public static function login(int $userId): void
    {
        $db = new mysqli('localhost', 'root', '', 'project1');

        $db->query("DELETE FROM `users_token` WHERE `user_id` = '" . $userId . "'");

        $token = md5($userId . 'super_secret_password#000' . date('Y-m-d'));

        $db->query("INSERT INTO `users_token` (user_id, token) VALUES ('" .$userId . "', '" . $token . "')");

        setcookie('token', $token, time()+3600, '/' );

    }

    public static function check(): bool
    {
        $db = new mysqli('localhost', 'root', '', 'project1');

        $exist = $db->query("SELECT * FROM users_token WHERE token = '" . $_COOKIE['token'] . "'");

        if ($exist->num_rows === 0) {
            return false;
        } else {
            return true;
        }
    }

    public static function user(): ?array
    {
        $db = new mysqli('localhost', 'root', '', 'project1');

        $token = $db->query("SELECT * FROM users_token WHERE token = '" . $_COOKIE['token'] . "'")->fetch_assoc();

        $user = $db->query("SELECT * FROM `users` WHERE `id` = '" . $token['user_id'] . "'");

        return $user->fetch_assoc();
    }
}