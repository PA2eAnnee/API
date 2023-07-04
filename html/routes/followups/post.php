<?php

// Récupérer des données depuis le corps de la requête
// Faire une requête SQL pour créer un utilisateur
// Renvoyer une réponse (succès, echec) à l'utilisateur de l'API

require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../entities/followups/create-followup.php";
require_once __DIR__ . "/../../libraries/authorization.php";


if (authorization(0)){

    try {
        $body = getBody();
    
        createFollowup($body["id_sender"], $body["content"], $body["id_ticket"]);
    
        echo jsonResponse(200, [], [
            "success" => true,
            "message" => "Followups créé"
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
