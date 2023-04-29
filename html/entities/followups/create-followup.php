<?php

function createFollowup(string $id_sender, string $content, string $id_ticket): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
    INSERT INTO FOLLOWUP (id_sender, content, send_date, id_ticket) VALUES
    (:id_sender, :content, NOW(), :id_ticket);
    ");

    $createUserQuery->execute([
        ":id_sender" => htmlspecialchars($id_sender),
        ":content" => htmlspecialchars($content),
        ":id_ticket" => htmlspecialchars($id_ticket)
    ]);
}
