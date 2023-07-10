<?php

function getEvent(?array $columns = null): array
{
    if (!is_array($columns)) {
        $columns = [];
    }

    require_once __DIR__ . "/../../database/connection.php";

    $authorizedColumns = ["id", "description", "type", "max_members", "price", "start_date", "end_date", "id_site", "recipe_id","status","organizer"];

    $where = [];
    $sanitizedColumns = [];

    foreach ($columns as $columnName => $columnValue) {
        if (!in_array($columnName, $authorizedColumns)) {
            continue;
        }

        if ($columnValue === null) {
            $sanitizedColumns[$columnName] = null;
        } else {
            $sanitizedColumns[$columnName] = htmlspecialchars($columnValue);
        }

        $where[] = "$columnName = :$columnName";
    }

    $whereClause = count($where) > 0 ? implode(" AND ", $where) : "1";

    $databaseConnection = getDatabaseConnection();
    $getUserQuery = $databaseConnection->prepare("SELECT * FROM EVENT WHERE $whereClause;");
    $getUserQuery->execute($sanitizedColumns);

    $events = $getUserQuery->fetchAll(PDO::FETCH_ASSOC);

    return $events;
}

