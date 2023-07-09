<?php

function createLessons(string $name, string $description, string $consultation_date): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
        INSERT INTO LESSON(
            name,
            description,
            consultation_date
        ) VALUES (
            :name,
            :description,
            :consultation_date
        );
    ");

    $createUserQuery->execute([
        ":name" => htmlspecialchars($name),
        ":description" => htmlspecialchars($description),
        ":consultation_date" => htmlspecialchars($consultation_date)
    ]);
}
