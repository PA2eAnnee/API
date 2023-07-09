<?php

function deleteParticipate_courses(string $user_id, string $course_id): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $deleteUserQuery = $databaseConnection->prepare("DELETE FROM PARTICIPATE_COURSE WHERE user_id = :user_id AND course_id = :course_id");

    $deleteUserQuery->execute([
        ":user_id" => htmlspecialchars($user_id),
        ":course_id" => htmlspecialchars($course_id)
    ]);
}


