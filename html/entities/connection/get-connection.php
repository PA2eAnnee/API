<?php
function getConnection(string $email, string $password, $user): ?array
{
    require_once __DIR__ . "/../../database/connection.php";

    // Générer un token unique
    $token = bin2hex(random_bytes(64));

    // Insérer le token dans la table TOKENS avec l'id de l'utilisateur
    $databaseConnection = getDatabaseConnection();
    $insertTokenQuery = $databaseConnection->prepare("INSERT INTO TOKENS (user_id, token) VALUES (:user_id, :token);");
    $insertTokenQuery->execute([
        "user_id" => $user[0]['id'],
        "token" => $token
    ]);
    

    // Retourner toutes les informations de l'utilisateur avec le token généré
    return ["connection" => array_merge($user[0], ["token" => $token])];
}


