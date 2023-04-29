<?php

function deleteOrder(string $id): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $deleteUserQuery = $databaseConnection->prepare("DELETE FROM ORDERS WHERE id = :id");

    $deleteUserQuery->execute([
        "id" => $id
    ]);
}
