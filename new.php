<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', 'on');
mb_internal_encoding("UTF-8");

require_once('core/db.php');

$data = [
    "last_id" => $_POST['last_id']
];

$sql = 'SELECT * FROM posts WHERE del = 0 AND id > ' . $data['last_id'];
$params = [];

$result = dbQuery($sql, $params)->fetchAll();

echo json_encode($result, JSON_UNESCAPED_UNICODE);
exit;
