<?php

function createLessons(string $name, string $description): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
        INSERT INTO LESSON(
            name,
            description
        ) VALUES (
            :name,
            :description
        );
    ");

    $createUserQuery->execute([
        ":name" => htmlspecialchars($name),
        ":description" => htmlspecialchars($description)
    ]);
}
