<?php

function createParticipate_lessons(string $user_id, string $lesson_id,string $recipe_id,string $last_consultation): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
    INSERT INTO PARTICIPATE_LESSON (user_id, lesson_id,recipe_id,last_consultation) VALUES
    (:user_id, :lesson_id, :recipe_id, :last_consultation);
    ");

    $createUserQuery->execute([
        ":user_id" => htmlspecialchars($user_id),
        ":lesson_id" => htmlspecialchars($lesson_id),
        ":recipe_id" => htmlspecialchars($recipe_id),
        ":last_consultation" => htmlspecialchars($last_consultation)
    ]);
}
