<?php

function createRequire_lessons(string $formation_id, string $lesson_id): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
    INSERT INTO REQUIRE_LESSON (formation_id, lesson_id) VALUES
    (:formation_id, :lesson_id);
    ");

    $createUserQuery->execute([
        ":formation_id" => htmlspecialchars($formation_id),
        ":lesson_id" => htmlspecialchars($lesson_id)
    ]);
}
