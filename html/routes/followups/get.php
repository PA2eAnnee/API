<?php
require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../entities/followups/get-followups.php";

try {

    $body = getBody();
    $followups = getFollowup($body);

    echo jsonResponse(200, ["X-School" => "ESGI"], [
        "success" => true,
        "followups" => $followups
    ]);
} catch (Exception $exception) {
    echo jsonResponse(500, [], [
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}
