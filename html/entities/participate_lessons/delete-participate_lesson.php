<?php

function deleteParticipate_lessons(string $user_id, string $lesson_id): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $deleteUserQuery = $databaseConnection->prepare("DELETE FROM PARTICIPATE_LESSON WHERE user_id = :user_id AND lesson_id = :lesson_id");

    $deleteUserQuery->execute([
        ":user_id" => htmlspecialchars($user_id),
        ":lesson_id" => htmlspecialchars($lesson_id)
    ]);
}


