<?php

function deleteContain(string $id_article ,string $id_order): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $deleteUserQuery = $databaseConnection->prepare("DELETE FROM CONTAINS WHERE id_article = :id_article AND id_order = :id_order;");

    $deleteUserQuery->execute([
        ":id_article" => htmlspecialchars($id_article),
        ":id_order" => htmlspecialchars($id_order)
    ]);
}


