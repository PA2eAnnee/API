<?php

function createArticle(string $name, string $description, string $stock, string $price, string $picture): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
    INSERT INTO ARTICLES (name, description, stock, price, picture) VALUES
    (:name, :description, :stock, :price, :picture);
    ");

    $createUserQuery->execute([
        ":name" => htmlspecialchars($name),
        ":description" => htmlspecialchars($description),
        ":stock" => htmlspecialchars($stock),
        ":price" => htmlspecialchars($price),
        ":picture" => htmlspecialchars($picture)
    ]);
}
