<?php
require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../entities/books/get-books.php";

try {

    $body = getBody();
    $books = getBook($body);

    echo jsonResponse(200, ["X-School" => "ESGI"], [
        "success" => true,
        "books" => $books
    ]);
} catch (Exception $exception) {
    echo jsonResponse(500, [], [
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}
