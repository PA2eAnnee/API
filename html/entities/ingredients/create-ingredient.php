<?php

function createIngredients(string $name): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
        INSERT INTO Ingredient(
            name
        ) VALUES (
            :name
        );
    ");

    $createUserQuery->execute([
        ":name" => htmlspecialchars($name)
    ]);
}
