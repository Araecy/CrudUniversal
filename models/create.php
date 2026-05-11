<?php

class CreateRecord
{

    public static function create($pdo, $type, $title, $content)
    {
        // Insert new record into database
        $stmt = $pdo->prepare("
            INSERT INTO records (type, title, content)
            VALUES (:type, :title, :content)
        ");
        // Use prepared statements to prevent SQL injection
        $stmt->execute([
            ':type' => $type,
            ':title' => $title,
            ':content' => $content
        ]);
    }
}
