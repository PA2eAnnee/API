<?php
require_once __DIR__ . "/../cours/get-cours.php";

function getParticipe_courses(?array $columns = null): array
{
    if (!is_array($columns)) {
        $columns = [];
    }

    require_once __DIR__ . "/../../database/connection.php";

    $authorizedColumns = ["user_id", "course_id"];

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
    $getUserQuery = $databaseConnection->prepare("SELECT * FROM PARTICIPATE_COURSE WHERE $whereClause");
    $getUserQuery->execute($sanitizedColumns);

    $participatedCours = $getUserQuery->fetchAll(PDO::FETCH_ASSOC);

    $lessons = [];
    foreach ($participatedCours as $participatedLesson) {
        $lesson = getCours(['course_id' => $participatedLesson['course_id']]);
        $lessons[] = $lesson[0];
    }

    return $participatedCours;
}


