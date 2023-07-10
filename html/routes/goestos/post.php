<?php

require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../entities/goestos/create-goesto.php";
require_once __DIR__ . "/../../libraries/authorization.php";
require_once __DIR__ . "/../../entities/tokens/get-tokens.php";
require_once __DIR__ . "/../../libraries/get-bearer-token.php";

$body = getBody();

// Check if the required keys exist in the $body array
if (isset($body["id_user"]) && isset($body["id_event"])) {
    try {
        if (getToken(["token" => getBearerToken()])[0]["user_id"] == $body["id_user"] || authorization(2)) {
            createGoesto($body["id_user"], $body["id_event"]);

            echo jsonResponse(200, [], [
                "success" => true,
                "message" => "Goesto ajouté"
            ]);
        } else {
            echo jsonResponse(400, [], [
                "success" => false,
                "error" => "Vous n'avez pas les droits nécessaires pour effectuer cette action"
            ]);
        }
    } catch (Exception $exception) {
        echo jsonResponse(500, [], [
            "success" => false,
            "error" => "Une erreur s'est produite lors du traitement de la requête."
        ]);
    }
} else {
    echo jsonResponse(400, [], [
        "success" => false,
        "error" => "Données manquantes dans le corps de la requête."
    ]);
}
