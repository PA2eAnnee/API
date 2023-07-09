<?php
require_once __DIR__ . "/../lessons/get-lessons.php";

function getRequire_lessons(?array $columns = null): array
{
    if (!is_array($columns)) {
        $columns = [];
    }

    require_once __DIR__ . "/../../database/connection.php";

    $authorizedColumns = ["formation_id", "lesson_id"];

    $where = [];
    $sanitizedColumns = [];

    foreach ($columns as $columnName => $columnValue) {
        if (!in_array($columnName, $authorizedColumns)) {
            continue;
        }

        $where[] = "$columnName = :$columnName";
        $sanitizedColumns[":$columnName"] = htmlspecialchars($columnValue);
    }

    $whereClause = count($where) > 0 ? implode(" AND ", $where) : "1";

    $databaseConnection = getDatabaseConnection();
    $getUserQuery = $databaseConnection->prepare("SELECT * FROM REQUIRE_LESSON WHERE $whereClause");
    $getUserQuery->execute($sanitizedColumns);

    $participatedLessons = $getUserQuery->fetchAll(PDO::FETCH_ASSOC);

    $lessons = [];
    foreach ($participatedLessons as $participatedLesson) {
        $lesson = getLessons(['id' => $participatedLesson['lesson_id']]);
        $lessons[] = $lesson[0];
    }

    return $lessons;
}



