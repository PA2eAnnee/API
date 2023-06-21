<?php

function createRecipe(string $name, string $description, string $duration, string $complexityLevel, string $video): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
        INSERT INTO Recipe(
            name,
            description,
            duration,
            complexityLevel,
            video
        ) VALUES (
            :name,
            :description,
            :duration,
            :complexityLevel,
            :video
        );
    ");

    $createUserQuery->execute([
        ":name" => htmlspecialchars($name),
        ":description" => htmlspecialchars($description),
        ":duration" => htmlspecialchars($duration),
        ":complexityLevel" => htmlspecialchars($complexityLevel),
        ":video" => htmlspecialchars($video)
    ]);
}
