<?php
require_once __DIR__ . "/../events/get-events.php";

function getGoesto(?array $columns = null): array
{
    if (!is_array($columns)) {
        $columns = [];
    }

    require_once __DIR__ . "/../../database/connection.php";

    $authorizedColumns = ["id_user", "id_event"];

    $where = [];
    $sanitizedColumns = [];

    foreach ($columns as $columnName => $columnValue) {
        if (!in_array($columnName, $authorizedColumns)) {
            continue;
        }

        $where[] = "$columnName = :$columnName";
        $sanitizedColumns[$columnName] = $columnValue;
    }

    $whereClause = count($where) > 0 ? implode(" AND ", $where) : "1";

    $databaseConnection = getDatabaseConnection();
    $getUserQuery = $databaseConnection->prepare("SELECT * FROM GOESTO WHERE $whereClause");
    $getUserQuery->execute($sanitizedColumns);

    $goestos = $getUserQuery->fetchAll(PDO::FETCH_ASSOC);

    $events = [];
    foreach ($goestos as $goesto) {
        $event = getEvents(['event_id' => $goesto['id_event']]);
        $events[] = $event[0];
    }

    return $events;
}

