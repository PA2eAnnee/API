<?php

require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../libraries/parameters.php";
require_once __DIR__ . "/../../entities/followups/update-followup.php";

try {
    $body = getBody();
    $parameters = getParametersForRoute("/followups/:followup");
    $id = $parameters["followup"];

    updateFollowup($id, $body);

    echo jsonResponse(200, [], [
        "success" => true,
        "message" => "updated"
    ]);
} catch (Exception $exception) {
    echo jsonResponse(500, [], [
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}
