<?php

require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../entities/events/create-event.php";

try {
    $body = getBody();

    $recipeId = isset($body["recipe_id"]) ? $body["recipe_id"] : null;

    createEvent($body["description"], $body["type"], $body["max_members"], $body["price"], $body["start_date"], $body["end_date"], $body["id_site"], $recipeId);

    echo jsonResponse(200, [], [
        "success" => true,
        "message" => "Event créé"
    ]);
} catch (Exception $exception) {
    echo jsonResponse(500, [], [
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}

