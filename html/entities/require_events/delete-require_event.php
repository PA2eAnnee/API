<?php

function deleteRequire_events(string $formation_id ,string $event_id): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $deleteUserQuery = $databaseConnection->prepare("DELETE FROM REQUIRE_EVENT WHERE formation_id = :formation_id AND event_id = :event_id");

    $deleteUserQuery->execute([
        ":formation_id" => htmlspecialchars($formation_id),
        ":event_id" => htmlspecialchars($event_id)
    ]);
}


