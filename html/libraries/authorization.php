<?php

function authorization($role) {


    $headers = apache_request_headers();
    $token = isset($headers['Authorization']) ? $headers['Authorization'] : null;

    // Vérifier si le token existe
    if (!$token) {
        return null; // ou une valeur par défaut si nécessaire
    }

    // Supprimer le préfixe 'Bearer ' du token si présent
    $token = str_replace('Bearer ', '', $token);

    $tokenData = getToken(["token" => $token]);

    $userId = $tokenData[0]['user_id'];

    // Supposons que l'ID de l'utilisateur soit récupéré et stocké dans une variable appelée $userId

    // Logique pour récupérer le rôle de l'utilisateur à partir de l'ID
    $databaseConnection = getDatabaseConnection();
    $selectRoleQuery = $databaseConnection->prepare("SELECT role FROM USERS WHERE id = :id;");
    $selectRoleQuery->execute([
        "id" => $userId,
    ]);
    $userData = $selectRoleQuery->fetch();

    $role = isset($userData['role']) ? $userData['role'] : null;



    if($role !== null){
        $rolenumber = getRoleNumber($role);
        if($rolenumber >= $role ){
            return true;
        }

    } 
    



    return false;


}

function getRoleNumber($role) {
    $correspondanceTable = [
        'users' => 0,
        'COOKER' => 1,
        'WORKER' => 2,
        'ADMIN' => 3,
    ];

    // Rechercher le numéro correspondant au rôle dans la table de correspondance
    $roleNumber = isset($correspondanceTable[$role]) ? $correspondanceTable[$role] : null;

    return $roleNumber;
}


