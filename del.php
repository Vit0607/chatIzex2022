<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', 'on');
mb_internal_encoding("UTF-8");

require_once('core/db.php');

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];

    $sql = "UPDATE posts SET del = 1 WHERE id = $id";
    $params = [];

    $result = dbQuery($sql, $params);

    echo json_encode(['status' => ' OK'], JSON_UNESCAPED_UNICODE);
    exit;
}
