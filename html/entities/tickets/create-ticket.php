<?php

function createTicket(string $title, string $description, string $id_sender): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
    INSERT INTO TICKET (title, description, creation_date, id_sender) VALUES
    (:title, :description, CURRENT_TIMESTAMP, :id_sender);
    ");

    $createUserQuery->execute([
        ":title" => htmlspecialchars($title),
        ":description" => htmlspecialchars($description),
        ":id_sender" => htmlspecialchars($id_sender)
    ]);
}
