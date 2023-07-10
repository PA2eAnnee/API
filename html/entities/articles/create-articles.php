<?php

function createArticle(string $nom, string $description, string $stock, string $price, string $picture): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
    INSERT INTO ARTICLES (nom, description, stock, price, picture) VALUES
    (:nom, :description, :stock, :price, :picture);
    ");

    $createUserQuery->execute([
        ":nom" => htmlspecialchars($nom),
        ":description" => htmlspecialchars($description),
        ":stock" => htmlspecialchars($stock),
        ":price" => htmlspecialchars($price),
        ":picture" => htmlspecialchars($picture)
    ]);
}
