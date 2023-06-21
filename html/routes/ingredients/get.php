<?php
require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../entities/ingredients/get-ingredients.php";

try {

    $body = getBody();
    $ingredients = getIngredients($body);

    echo jsonResponse(200, ["X-School" => "ESGI"], [
        "success" => true,
        "ingredients" => $ingredients
    ]);
} catch (Exception $exception) {
    echo jsonResponse(500, [], [
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}
