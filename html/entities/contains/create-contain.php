<?php

function createContain(string $id_article, string $id_order, string $quantity): int
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
    INSERT INTO CONTAINS (id_article, id_order, quantity) VALUES
    (:id_article, :id_order, :quantity);
    ");

    $createUserQuery->execute([
        ":id_article" => htmlspecialchars($id_article),
        ":id_order" => htmlspecialchars($id_order),
        ":quantity" => htmlspecialchars($quantity),
    ]);

    $userId = $databaseConnection->lastInsertId();
    return $userId;

    
}
