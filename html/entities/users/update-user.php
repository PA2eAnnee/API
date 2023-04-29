<?php

function updateUser(string $id, $columns): void
{
    if (count($columns) === 0) {
        return;
    }

    require_once __DIR__ . "/../../database/connection.php";

    $authorizedColumns = ["email", "name", "first_name", "username", "email", "role", "subscription", "password"];

    $set = [];

    $sanitizedColumns = [
        "id" => htmlspecialchars($id)
    ];

    foreach ($columns as $columnName => $columnValue) {
        if (!in_array($columnName, $authorizedColumns)) {
            continue;
        }

        $set[] = "$columnName = :$columnName";

        $sanitizedColumns[$columnName] = htmlspecialchars($columnValue);
    }

    $set = implode(", ", $set);

    $databaseConnection = getDatabaseConnection();
    $updateUserQuery = $databaseConnection->prepare("UPDATE USERS SET $set WHERE id = :id;");
    $updateUserQuery->execute($sanitizedColumns);
}
