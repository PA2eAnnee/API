<?php

// Vérifie si une image a été envoyée
if (isset($_FILES['photo'])) {
    // Vérifie si le dossier de destination existe, sinon le crée
    $uploadDir = '../../../pictures/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Récupère les informations sur le fichier
    $fileInfo = getimagesize($_FILES['photo']['tmp_name']);
    if ($fileInfo !== false) {
        // Vérifie si le fichier est une image
        $mime = $fileInfo['mime'];
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($mime, $allowedMimeTypes)) {
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
            // Le fichier n'est pas une image valide
            $response = [
                'status' => 'error',
                'message' => 'Invalid file format. Only JPEG, PNG, and GIF images are allowed.'
            ];
        }
    } else {
        // Impossible de récupérer les informations sur le fichier
        $response = [
            'status' => 'error',
            'message' => 'Failed to retrieve file information.'
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
