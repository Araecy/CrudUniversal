<?php

require_once "./config/config.php";
require_once "./controllers/recordController.php";
$types = require "config/types.php";

$controller = new RecordController();

$action = $_GET['action'] ?? 'index';
$type = $_GET['type'] ?? 'book';

// validate type
if (!array_key_exists($type, $types)) {
    die("Invalid type");
}

if ($action === 'index') {

    $controller->index($pdo, $type);

} elseif ($action === 'create') {

    $controller->createForm($type, $types);

} elseif ($action === 'store') {

    $controller->store($pdo, $type);

} else {
    echo "404 Not Found";
}