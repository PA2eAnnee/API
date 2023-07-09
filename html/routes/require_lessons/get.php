<?php
require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../entities/require_lessons/get-require_lessons.php";
require_once __DIR__ . "/../../libraries/authorization.php";


if (authorization(1)){

    try {

        $body = getBody();
        $require_lessons = getRequire_lessons($body);
    
        echo jsonResponse(200, ["X-School" => "ESGI"], [
            "success" => true,
            "require_lessons" => $require_lessons
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