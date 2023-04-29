<?php

function deleteBook(string $id_user ,string $id_space, string $book_date): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $deleteUserQuery = $databaseConnection->prepare("DELETE FROM BOOKS WHERE id_user = :id_user AND id_space = :id_space AND book_date = :book_date;");

    $deleteUserQuery->execute([
        ":id_user" => htmlspecialchars($id_user),
        ":id_space" => htmlspecialchars($id_space),
        ":book_date" => htmlspecialchars($book_date)

    ]);
}


