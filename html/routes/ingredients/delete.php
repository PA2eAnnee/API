<?php

require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../libraries/parameters.php";
require_once __DIR__ . "/../../entities/ingredients/delete-ingredient.php";
require_once __DIR__ . "/../../libraries/authorization.php";


if (authorization(2)){


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



}else{
    echo jsonResponse(400, [], [
        "success" => false,
        "error" => "Vous n'avez pas les droit néccessaire pour effectuer cette action"
    ]);
}