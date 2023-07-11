<?php
require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../entities/cours/get-cours.php";
require_once __DIR__ . "/../../libraries/authorization.php";


if (authorization(2)){

    try {

        $body = getBody();
        $users = getCours($body);
    
        echo jsonResponse(200, ["X-School" => "ESGI"], [
            "success" => true,
            "cours" => $cours
        ]);
    } catch (Exception $exception) {
        echo jsonResponse(500, [], [
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