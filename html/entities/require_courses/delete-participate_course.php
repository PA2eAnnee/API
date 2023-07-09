<?php

function deleteRequire_courses(string $formation_id, string $course_id): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $deleteUserQuery = $databaseConnection->prepare("DELETE FROM REQUIRE_COURSE WHERE formation_id = :formation_id AND course_id = :course_id");

    $deleteUserQuery->execute([
        ":formation_id" => htmlspecialchars($formation_id),
        ":course_id" => htmlspecialchars($course_id)
    ]);
}


