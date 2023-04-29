<?php

function createSpace(string $max_availability, string $id_site): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
    INSERT INTO SPACE (max_availability, id_site)
    VALUES (:max_availability, :id_site);
    
    ");

    $createUserQuery->execute([
        ":max_availability" => htmlspecialchars($max_availability),
        ":id_site" => htmlspecialchars($id_site),
    ]);
}
