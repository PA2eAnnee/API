<?php
require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../entities/tokens/get-tokens.php";

try {

    $body = getBody();
    $tokens = getToken($body);

    echo jsonResponse(200, ["X-School" => "ESGI"], [
        "success" => true,
        "tokens" => $tokens
    ]);
} catch (Exception $exception) {
    echo jsonResponse(500, [], [
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}
