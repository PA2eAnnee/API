<?php

require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../libraries/parameters.php";
require_once __DIR__ . "/../../entities/diplomes/update-diplome.php";

try {
    $body = getBody();
    $parameters = getParametersForRoute("/diplomes/:diplome");
    $id = $parameters["diplome"];

    updateDiplomes($id, $body);

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
