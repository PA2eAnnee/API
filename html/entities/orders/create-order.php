<?php

function createOrder(string $total_price, string $id_user , string $quantity ): int
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
    INSERT INTO ORDERS (send_date, total_price, id_user, quantity) VALUES
    (CURRENT_TIMESTAMP, :total_price, :id_user , :quantity);
    ");

    $createUserQuery->execute([
        ":total_price" => htmlspecialchars($total_price),
        ":id_user" => htmlspecialchars($id_user),
        ":quantity" => htmlspecialchars($quantity)
    ]);

    $userId = $databaseConnection->lastInsertId();
    return $userId;
}
