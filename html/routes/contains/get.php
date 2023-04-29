<?php
require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../entities/contains/get-contains.php";

try {

    $body = getBody();
    $contains = getContain($body);

    echo jsonResponse(200, ["X-School" => "ESGI"], [
        "success" => true,
        "contains" => $contains
    ]);
} catch (Exception $exception) {
    echo jsonResponse(500, [], [
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}
