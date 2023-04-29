<?php

function createContain(string $id_article, string $id_order): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
    INSERT INTO CONTAINS (id_article, id_order) VALUES
    (:id_article, :id_order);
    ");

    $createUserQuery->execute([
        ":id_article" => htmlspecialchars($id_article),
        ":id_order" => htmlspecialchars($id_order)
    ]);
}
