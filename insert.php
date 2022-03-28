<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', 'on');
mb_internal_encoding("UTF-8");

require_once('core/db.php');

$post = $_POST;

$params = [
    'login' => htmlspecialchars($post['login']),
    'message' => htmlspecialchars($post['message'])
];

if (!$_POST['message']) {
    die('empty');
}

//var_dump($post);

$sql = 'INSERT INTO posts (login, message) VALUES (:login, :message)';

dbQuery($sql, $params);

//echo 'Все работает!';
