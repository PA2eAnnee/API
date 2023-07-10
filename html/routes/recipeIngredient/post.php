<?php
require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../entities/recipeIngredients/get-recipeIngredients.php";
require_once __DIR__ . "/../../libraries/authorization.php";

if (authorization(0)) {
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
} else {
    echo jsonResponse(400, [], [
        "success" => false,
        "error" => "Vous n'avez pas les droits nécessaires pour effectuer cette action"
    ]);
}
