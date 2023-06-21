<?php

function createMessage(string $id_sender, string $content, string $id_conversation): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
    INSERT INTO MESSAGE (id_sender, content, send_date, id_conversation) VALUES
    (:id_sender, :content, CURRENT_TIMESTAMP, :id_conversation);
    ");

    $createUserQuery->execute([
        ":id_sender" => htmlspecialchars($id_sender),
        ":content" => htmlspecialchars($content),
        ":id_conversation" => htmlspecialchars($id_conversation)
    ]);
}
