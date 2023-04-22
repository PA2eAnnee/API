<?php

function getSites(): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $getUsersQuery = $databaseConnection->query("SELECT * FROM site;");
    return $getUsersQuery->fetchAll(PDO::FETCH_ASSOC);
}
