<?php
require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../entities/recipeIngredients/get-recipeIngredients.php";

try {

    $body = getBody();
    $recipeIngredients = getRecipeIngredients($body);

    echo jsonResponse(200, ["X-School" => "ESGI"], [
        "success" => true,
        "recipeIngredients" => $recipeIngredients
    ]);
} catch (Exception $exception) {
    echo jsonResponse(500, [], [
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}
