<?php

// Récupérer des données depuis le corps de la requête
// Faire une requête SQL pour créer un utilisateur
// Renvoyer une réponse (succès, echec) à l'utilisateur de l'API

require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../entities/participate_lessons/create-participate_lesson.php";
require_once __DIR__ . "/../../libraries/authorization.php";
require_once __DIR__ . "/../../entities/tokens/get-tokens.php";
require_once __DIR__ . "/../../libraries/get-bearer-token.php";

$body = getBody();

if (getToken(["token" => getBearerToken()])[0]["user_id"] == $body["user_id"] || authorization(2)) {

    try {
    
        createParticipate_lessons($body["user_id"], $body["lesson_id"],$body["recipe_id"],$body["last_consultation"]);
    
        echo jsonResponse(200, [], [
            "success" => true,
            "message" => "participate_lessons ajouté"
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