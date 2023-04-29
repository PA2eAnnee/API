<?php
require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../entities/goestos/get-goestos.php";

try {

    $body = getBody();
    $goestos = getGoesto($body);

    echo jsonResponse(200, ["X-School" => "ESGI"], [
        "success" => true,
        "goestos" => $goestos
    ]);
} catch (Exception $exception) {
    echo jsonResponse(500, [], [
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}
