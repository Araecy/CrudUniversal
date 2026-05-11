<?php

class Record
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function allByType($type)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM records WHERE type = :type");
        $stmt->execute([':type' => $type]);
        return $stmt->fetchAll();
    }

    public function find($id, $type)
    {
        $stmt = $this->pdo->prepare("
            SELECT * FROM records 
            WHERE id = :id AND type = :type
        ");

        $stmt->execute([
            ':id' => $id,
            ':type' => $type
        ]);

        return $stmt->fetch();
    }

    public function create($type, $title, $content)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO records (type, title, content)
            VALUES (:type, :title, :content)
        ");

        $stmt->execute([
            ':type' => $type,
            ':title' => $title,
            ':content' => $content
        ]);
    }

    public function update($id, $type, $newType, $title, $content)
    {
        $stmt = $this->pdo->prepare("
            UPDATE records
            SET type = :newType, title = :title, content = :content
            WHERE id = :id AND type = :type
        ");

        $stmt->execute([
            ':id' => $id,
            ':type' => $type,
            ':newType' => $newType,
            ':title' => $title,
            ':content' => $content
        ]);
    }

    public function delete($id, $type)
    {
        $stmt = $this->pdo->prepare("
            DELETE FROM records 
            WHERE id = :id AND type = :type
        ");

        $stmt->execute([
            ':id' => $id,
            ':type' => $type
        ]);
    }
}