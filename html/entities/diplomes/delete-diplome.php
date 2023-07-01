<?php

function deleteDiplomes(string $id): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $deleteUserQuery = $databaseConnection->prepare("DELETE FROM DIPLOMES WHERE id = :id");

    $deleteUserQuery->execute([
        "id" => $id
    ]);
}
