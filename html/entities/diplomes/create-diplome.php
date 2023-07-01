<?php

function createDiplomes(string $description, string $user_id, string $date_obtention): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
        INSERT INTO DIPLOMES(
            description,
            user_id,
            date_obtention
        ) VALUES (
            :description,
            :user_id,
            CURRENT_TIMESTAMP
        );
    ");

    $createUserQuery->execute([
        ":description" => htmlspecialchars($description),
        ":user_id" => htmlspecialchars($user_id),
        ":date_obtention" => htmlspecialchars($date_obtention)
    ]);
}
