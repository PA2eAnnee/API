<?php

function createCours(string $name, string $description, string $price, string $type, string $course_date): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
        INSERT INTO COURSE(
            name,
            description,
            price,
            type,
            course_date
        ) VALUES (
            :name,
            :description,
            :price,
            :type,
            :course_date
        );
    ");

    $createUserQuery->execute([
        ":name" => htmlspecialchars($name),
        ":description" => htmlspecialchars($description),
        ":price" => htmlspecialchars($price),
        ":type" => htmlspecialchars($type),
        ":course_date" => htmlspecialchars($course_date)
    ]);
}
