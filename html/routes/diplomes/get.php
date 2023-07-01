<?php
require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../entities/diplomes/get-diplomes.php";

try {

    $body = getBody();
    $diplomes = getDiplomes($body);

    echo jsonResponse(200, ["X-School" => "ESGI"], [
        "success" => true,
        "diplomes" => $diplomes
    ]);
} catch (Exception $exception) {
    echo jsonResponse(500, [], [
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}
