<?php

require_once "models/Record.php";

class RecordController
{
    private $model;
    private $types;

    public function __construct($pdo)
    {
        $this->model = new Record($pdo);
        $this->types = require "config/types.php";
    }

    public function index($type)
    {
        $records = $this->model->allByType($type);
        $types = $this->types;
        require "views/list.php";
    }

    public function create($type)
    {
        $types = $this->types;
        require "views/createForm.php";
    }

    public function store($type)
    {
        $this->model->create($type, $_POST['title'], $_POST['content']);

        header("Location: index.php?action=index&type=$type");
        exit;
    }

    public function edit($type)
    {
        $types = $this->types;
        $record = $this->model->find($_GET['id'], $type);
        require "views/editForm.php";
    }

    public function update($type)
    {
        $newType = $_POST['type'] ?? $type;
        $this->model->update($_GET['id'], $type, $newType, $_POST['title'], $_POST['content']);

        header("Location: index.php?action=index&type=$newType");
        exit;
    }

    public function delete($type)
    {
        $this->model->delete($_GET['id'], $type);

        header("Location: index.php?action=index&type=$type");
        exit;
    }
}