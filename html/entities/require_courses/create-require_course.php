<?php

function createRequire_courses(string $formation_id, string $course_id): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
    INSERT INTO REQUIRE_COURSE (formation_id, course_id) VALUES
    (:user_id, :course_id);
    ");

    $createUserQuery->execute([
        ":formation_id" => htmlspecialchars($formation_id),
        ":course_id" => htmlspecialchars($course_id)
    ]);
}
