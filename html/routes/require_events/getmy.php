<?php
require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../entities/goestos/get-mygoestos.php";
require_once __DIR__ . "/../../libraries/authorization.php";


if (authorization(1)){

    try {

        $body = getBody();
        $goestos = getGoesto($body);
    
        echo jsonResponse(200, ["X-School" => "ESGI"], [
            "success" => true,
            "goestos" => $goestos
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