<?php

function deleteParticipate_lessons(string $formation_id, string $lesson_id): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $deleteUserQuery = $databaseConnection->prepare("DELETE FROM REQUIRE_LESSON WHERE formation_id = :formation_id AND lesson_id = :lesson_id");

    $deleteUserQuery->execute([
        ":formation_id" => htmlspecialchars($formation_id),
        ":lesson_id" => htmlspecialchars($lesson_id)
    ]);
}


