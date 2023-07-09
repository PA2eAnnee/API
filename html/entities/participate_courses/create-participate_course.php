<?php

function createParticipe_courses(string $user_id, string $course_id): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
    INSERT INTO PARTICIPATE_COURSE (user_id, course_id) VALUES
    (:user_id, :course_id);
    ");

    $createUserQuery->execute([
        ":user_id" => htmlspecialchars($user_id),
        ":course_id" => htmlspecialchars($course_id)
    ]);
}
