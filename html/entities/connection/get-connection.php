<?php
function getConnection(string $email, string $password): ?array
{
    require_once __DIR__ . "/../../database/connection.php";
    require_once __DIR__ . "/../users/get-users.php";

    // Vérifier si l'utilisateur existe avec l'email donné
    $user = getUser(["email" => $email]);

    if (empty($user)) {
        return ["success" => false, "error" => "L'utilisateur n'existe pas", "connection" => null];
    }

    // Vérifier si le mot de passe est correct
    if (!password_verify($password, $user[0]['password'])) {
        return ["success" => false, "error" => "Mot de passe incorrect", "connection" => null];
    }

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
    return ["success" => true, "error" => null, "connection" => array_merge($user[0], ["token" => $token])];
}


