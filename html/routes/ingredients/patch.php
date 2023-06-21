<?php

require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../libraries/parameters.php";
require_once __DIR__ . "/../../entities/ingredients/update-ingredient.php";

try {
    $body = getBody();
    $parameters = getParametersForRoute("/ingredients/:ingredient");
    $id = $parameters["ingredient"];

    updateIngredients($id, $body);

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
