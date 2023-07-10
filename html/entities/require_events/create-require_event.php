<?php

function createRequire_events(string $formation_id, string $event_id): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
    INSERT INTO REQUIRE_EVENT (formation_id, event_id) VALUES
    (:formation_id, :event_id);
    ");

    $createUserQuery->execute([
        ":formation_id" => htmlspecialchars($formation_id),
        ":event_id" => htmlspecialchars($event_id)
    ]);
}
