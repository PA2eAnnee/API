<?php

require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../libraries/parameters.php";
require_once __DIR__ . "/../../entities/recipes/delete-recipe.php";

try {
    $parameters = getParametersForRoute("/recipes/:recipe");
    $id = $parameters["recipe"];
    deleteRecipe($id);

    echo jsonResponse(200, [], [
        "success" => true,
        "message" => "deleted"
    ]);
} catch (Exception $exception) {
    echo jsonResponse(200, [], [
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}
