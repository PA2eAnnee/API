<?php

function createBook(string $id_user, string $id_space, string $book_date): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
    INSERT INTO BOOKS (id_user, id_space, book_date) VALUES
    (:id_user, :id_space, :book_date);
    ");

    $createUserQuery->execute([
        ":id_user" => htmlspecialchars($id_user),
        ":id_space" => htmlspecialchars($id_space),
        ":book_date" => htmlspecialchars($book_date)
    ]);
}
