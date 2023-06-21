<?php

require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../libraries/parameters.php";
require_once __DIR__ . "/../../entities/ingredients/delete-ingredient.php";

try {
    $parameters = getParametersForRoute("/ingredients/:ingredient");
    $id = $parameters["ingredient"];
    deleteIngredients($id);

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
