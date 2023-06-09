<?php

function createSite(string $adress, string $postcode): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
        INSERT INTO SITE(
            address,
            postcode
        ) VALUES (
            :adress,
            :postcode
        );
    ");

    $createUserQuery->execute([
        ":adress" => htmlspecialchars($adress),
        ":postcode" => htmlspecialchars($postcode),
    ]);
}
