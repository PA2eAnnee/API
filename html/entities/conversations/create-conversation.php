<?php

function createConversation(string $id_receiver, string $id_sender): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
    INSERT INTO CONVERSATION (id_receiver, send_date, id_sender) VALUES
    (:id_receiver, NOW(), :id_sender);
    ");

    $createUserQuery->execute([
        ":id_receiver" => htmlspecialchars($id_receiver),
        ":id_sender" => htmlspecialchars($id_sender),
    ]);
}
