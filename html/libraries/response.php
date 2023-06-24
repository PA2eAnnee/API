<?php

function jsonResponse($statusCode, $headers, $body)
{
    // Modifie le code de statut
    http_response_code($statusCode);
    
    // On modifie les en-têtes
    foreach ($headers as $headerName => $headerValue) {
        header("$headerName: $headerValue");
    }

    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: http://cookmaster.local");
    // On renvoie une réponse (contenu)
    return json_encode($body);
}
