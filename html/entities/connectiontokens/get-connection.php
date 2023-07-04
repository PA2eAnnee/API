<?php
function getConnection(string $token): ?array
{
    require_once __DIR__ . "/../../database/connection.php";
    require_once __DIR__ . "/../tokens/get-tokens.php";

    $token = getToken(["token" => $token]);

    if (empty($token)) {
        $databaseConnection = getDatabaseConnection();
        $insertTokenQuery = $databaseConnection->prepare("SELECT user_id FROM TOKENS WHERE token = :token;");
        $insertTokenQuery->execute([
            "token" => $token[0]['token'],
        ]);
        return ["success" => false, "user_id" => null, "error" => "Token inexistant dans la BDD"];
    }

    $current_time = time();
    $token_creation_time = strtotime($token[0]['creation_time']);
    $time_elapsed = $current_time - $token_creation_time;
    $time_elapsed_hours = $time_elapsed / 3600;

    
    if ($time_elapsed_hours < 24) {
        return ["success" => true, "user_id" => $token[0]['user_id']];
    } else {
        $databaseConnection = getDatabaseConnection();
        $insertTokenQuery = $databaseConnection->prepare("DELETE FROM TOKENS WHERE token = :token;");
        $insertTokenQuery->execute([
            "token" => $token[0]['token'],
        ]);
        return ["success" => false, "user_id" => null, "error" => "Token expiré"];
    }
}

