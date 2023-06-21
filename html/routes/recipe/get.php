<?php
require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../entities/recipes/get-recipes.php";

try {

    $body = getBody();
    $recipes = getRecipe($body);

    echo jsonResponse(200, ["X-School" => "ESGI"], [
        "success" => true,
        "recipes" => $recipes
    ]);
} catch (Exception $exception) {
    echo jsonResponse(500, [], [
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}
