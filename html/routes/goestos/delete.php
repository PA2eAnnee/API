<?php

require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../libraries/parameters.php";
require_once __DIR__ . "/../../entities/goestos/delete-goesto.php";

try {
    $body = getBody();
    deleteGoesto($body["id_user"], $body["id_event"] );

    echo jsonResponse(200, [], [
        "success" => true,
        "message" => "deleted"
    ]);
} catch (Exception $exception) {
    echo jsonResponse(200, [], [
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}
