<?php

require_once "models/Record.php";

class RecordController
{
    private $model;

    public function __construct($pdo)
    {
        $this->model = new Record($pdo);
    }

    public function index($type)
    {
        $records = $this->model->allByType($type);
        require "views/list.php";
    }

    public function create()
    {
        require "views/createForm.php";
    }

    public function store($type)
    {
        $this->model->create(
            $type,
            $_POST['title'],
            $_POST['content']
        );

        header("Location: index.php?action=index&type=" . $type);
        exit;
    }

    public function edit($type)
    {
        $record = $this->model->find($_GET['id'], $type);
        require "views/edit.php";
    }

    public function update($type)
    {
        $this->model->update(
            $_GET['id'],
            $type,
            $_POST['title'],
            $_POST['content']
        );

        header("Location: index.php?action=index&type=" . $type);
        exit;
    }

    public function delete($type)
    {
        $this->model->delete($_GET['id'], $type);

        header("Location: index.php?action=index&type=" . $type);
        exit;
    }
}