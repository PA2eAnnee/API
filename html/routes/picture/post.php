
    <?php
    // Vérifie si une image a été soumise
    if(isset($_FILES['image'])) {
        $file = $_FILES['image'];
        
        // Vérifie s'il y a eu une erreur lors du téléchargement
        if($file['error'] === UPLOAD_ERR_OK) {
            echo "L'image a été téléchargée avec succès.";
        } else {
            echo "Une erreur s'est produite lors du téléchargement de l'image.";
        }
    }
    ?>

// Convertit la réponse en JSON
header('Content-Type: application/json');
echo json_encode($response);
?>