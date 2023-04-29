<?php
require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../entities/spaces/get-spaces.php";

try {

    $body = getBody();
    $users = getSpace($body);

    echo jsonResponse(200, ["X-School" => "ESGI"], [
        "success" => true,
        "users" => $users
    ]);
} catch (Exception $exception) {
    echo jsonResponse(500, [], [
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}
