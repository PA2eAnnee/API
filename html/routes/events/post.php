<?php

// Récupérer des données depuis le corps de la requête
// Faire une requête SQL pour créer un utilisateur
// Renvoyer une réponse (succès, echec) à l'utilisateur de l'API

require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../entities/events/create-event.php";

try {
    $body = getBody();

    createEvent($body["description"], $body["type"], $body["max_members"], $body["price"], $body["start_date"], $body["end_date"], $body["id_site"]);

    echo jsonResponse(200, [], [
        "success" => true,
        "message" => "Event créé"
    ]);
} catch (Exception $exception) {
    echo jsonResponse(500, [], [
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}
