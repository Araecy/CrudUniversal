<?php

require_once "config/config.php";
require_once "controllers/RecordController.php";

$type = $_GET['type'] ?? 'book';
$action = $_GET['action'] ?? 'index';

$controller = new RecordController($pdo);

if ($action === 'index') {

    $controller->index($type);

} elseif ($action === 'create') {

    $controller->create($type);

} elseif ($action === 'store') {

    $controller->store($type);

} elseif ($action === 'edit') {

    $controller->edit($type);

} elseif ($action === 'update') {

    $controller->update($type);

} elseif ($action === 'delete') {

    $controller->delete($type);

} else {
    echo "404 Not Found";
}