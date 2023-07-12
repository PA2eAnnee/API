<?php

function createOrder(string $total_price, string $id_user): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
    INSERT INTO ORDERS (send_date, total_price, id_user) VALUES
    (CURRENT_TIMESTAMP, :total_price, :id_user);
    ");

    $createUserQuery->execute([
        ":total_price" => htmlspecialchars($total_price),
        ":id_user" => htmlspecialchars($id_user)
    ]);

}
