<?php
require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../entities/participate_lessons/get-participate_lessons.php";
require_once __DIR__ . "/../../libraries/authorization.php";


if (authorization(1)){

    try {

        $body = getBody();
        $goestos = getParticipate_lessons($body);
    
        echo jsonResponse(200, ["X-School" => "ESGI"], [
            "success" => true,
            "participate_lessons" => $participate_lessons
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