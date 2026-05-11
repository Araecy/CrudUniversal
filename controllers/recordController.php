<?php

require_once "models/create.php";

class RecordController
{
    public function index($pdo, $type)
    {
        $stmt = $pdo->prepare("SELECT * FROM records WHERE type = :type");
        $stmt->execute([':type' => $type]);

        $records = $stmt->fetchAll();

        require "views/list.php";
    }

    // show create form
    public function createForm($type, $types)
    {
        require "views/createForm.php";
    }

    // handle form submit
    public function store($pdo, $type)
    {

        CreateRecord::create(
            $pdo,
            $type,
            $_POST['title'],
            $_POST['content']
        );

        header("Location: index.php?action=" . $type);
        exit;
    }
}