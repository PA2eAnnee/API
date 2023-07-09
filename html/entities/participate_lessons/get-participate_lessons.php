<?php
require_once __DIR__ . "/../lessons/get-lessons.php";

function getParticipate_lessons(?array $columns = null): array
{
    if (!is_array($columns)) {
        $columns = [];
    }

    require_once __DIR__ . "/../../database/connection.php";

    $authorizedColumns = ["user_id", "lesson_id", "recipe_id", "last_consultation"];

    $where = [];
    $sanitizedColumns = [];

    foreach ($columns as $columnName => $columnValue) {
        if (!in_array($columnName, $authorizedColumns)) {
            continue;
        }

        $where[] = "$columnName = :$columnName";
        $sanitizedColumns[":$columnName"] = $columnValue;
    }

    $whereClause = count($where) > 0 ? implode(" AND ", $where) : "1";

    $databaseConnection = getDatabaseConnection();
    $getUserQuery = $databaseConnection->prepare("SELECT l.* FROM PARTICIPATE_LESSON pl INNER JOIN LESSON l ON pl.lesson_id = l.lesson_id WHERE $whereClause");
    $getUserQuery->execute($sanitizedColumns);

    $participatedLessons = $getUserQuery->fetchAll(PDO::FETCH_ASSOC);

    return $participatedLessons;
}

