<?php
require_once __DIR__ . "/../events/get-events.php";
function getRequire_events(?array $columns = null): array
{
    if (!is_array($columns)) {
        $columns = [];
    }

    require_once __DIR__ . "/../../database/connection.php";

    $authorizedColumns = ["formation_id", "event_id"];

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
    $getUserQuery = $databaseConnection->prepare("SELECT * FROM REQUIRE_EVENT WHERE $whereClause");
    $getUserQuery->execute($sanitizedColumns);

    $goestos = $getUserQuery->fetchAll(PDO::FETCH_ASSOC);


    $events = [];
    foreach ($goestos as $goesto) {
        $event = getEvent(['id' => $goesto['event_id']]);
        $events[] = $event[0];
    }

    return $events;
}
