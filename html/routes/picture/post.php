<?php

// Vérifie si une image a été envoyée
if (isset($_FILES['photo'])) {
    // Vérifie si le dossier de destination existe, sinon le crée
    $uploadDir = __DIR__ . "/pictures/"; // Ajouter un slash avant "pictures"
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Génère un nom de fichier unique pour éviter les doublons
    $fileName = uniqid() . '_' . $_FILES['photo']['name'];
    $filePath = $uploadDir . $fileName;

    // Déplace le fichier vers le dossier de destination
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $filePath)) {
        // Le fichier a été téléchargé avec succès
        $response = [
            'status' => 'success',
            'message' => 'Photo uploaded successfully.',
            'file_path' => $filePath
        ];
    } else {
        // Une erreur s'est produite lors du téléchargement du fichier
        $response = [
            'status' => 'error',
            'message' => 'Failed to upload photo.'
        ];
    }
} else {
    // Aucune image envoyée
    $response = [
        'status' => 'error',
        'message' => 'No photo uploaded.'
    ];
}

// Convertit la réponse en JSON
header('Content-Type: application/json');
echo json_encode($response);
?>