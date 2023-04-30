<?php
require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../entities/connection/get-connection.php";

try {

    $body = getBody();
    $connection = getConnection($body["email"], $body["password"]);

    echo jsonResponse(200, ["X-School" => "ESGI"], [
        "success" => true,
        "connection" => $connection
    ]);
} catch (Exception $exception) {
    echo jsonResponse(500, [], [
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}