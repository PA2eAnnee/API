<?php

function createArticle(string $description, string $stock, string $price, string $picture): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
    INSERT INTO ARTICLES (description, stock, price, picture) VALUES
    (:description, :stock, :price, :picture);
    ");

    $createUserQuery->execute([
        ":description" => htmlspecialchars($description),
        ":stock" => htmlspecialchars($stock),
        ":price" => htmlspecialchars($price),
        ":picture" => htmlspecialchars($picture)
    ]);
}
