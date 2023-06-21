<?php
require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../entities/connection/get-connection.php";
require_once __DIR__ . "/../../database/connection.php";
require_once __DIR__ . "/../users/get-users.php";

try {   

        // Vérifier si l'utilisateur existe avec l'email donné
        $user = getUser(["email" => $email]);

        if (empty($user)) {
            echo jsonResponse(400, [] [
                'success' => false,
                'message' => "L'adresse mail ou le mot de passe est incorrect"
              ]);
        }
    
        // Vérifier si le mot de passe est correct
        if (!password_verify($password, $user[0]['password'])) {
            echo jsonResponse(400, [], [
                "success" => false, 
                "error" => "L'adresse mail ou le mot de passe est incorrect", 
                "connection" => null
            ]);
        }

    $body = getBody();
    $connection = getConnection($body["email"], $body["password"]);

    echo jsonResponse(200, ["X-School" => "ESGI"], [
        "success" => true,
        "connection" => $connection
    ]);
} catch (Exception $exception) {
    echo jsonResponse(500, [], [
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}