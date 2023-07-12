<?php

function createCours(string $name, string $description, string $price, string $type, string $course_date, string $course_enddate, string $user_id): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
        INSERT INTO COURSE(
            name,
            description,
            price,
            type,
            course_date,
            course_enddate,
            user_id

        ) VALUES (
            :name,
            :description,
            :price,
            :type,
            :course_date,
            :course_enddate,
            :user_id
        );
    ");

    $createUserQuery->execute([
        ":name" => htmlspecialchars($name),
        ":description" => htmlspecialchars($description),
        ":price" => htmlspecialchars($price),
        ":type" => htmlspecialchars($type),
        ":course_date" => htmlspecialchars($course_date),
        ":course_enddate" => htmlspecialchars($course_enddate),
        ":user_id" => htmlspecialchars($type)
    ]);
}
