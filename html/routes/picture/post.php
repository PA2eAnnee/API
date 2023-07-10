<?php

// Vérifie si une image a été envoyée
// if (isset($_FILES['photo'])) {
//     // Vérifie si le dossier de destination existe, sinon le crée
//     $uploadDir = __DIR__ . "/pictures/"; // Ajouter un slash avant "pictures"
//     if (!is_dir($uploadDir)) {
//         mkdir($uploadDir, 0777, true);
//     }

//     // Génère un nom de fichier unique pour éviter les doublons
//     $fileName = uniqid() . '_' . $_FILES['photo']['name'];
//     $filePath = $uploadDir . $fileName;

//     echo($filePath);
//     echo($fileName);


// } else {
//     // Aucune image envoyée
//     $response = [
//         'status' => 'error',
//         'message' => 'No photo uploaded.'
//     ];
// }

// // Convertit la réponse en JSON
// header('Content-Type: application/json');
// echo json_encode($response);
?>