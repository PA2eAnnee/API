<!DOCTYPE html>
<html>
<head>
    <title>Récupération de Token</title>
</head>
<body>
    <h1>Récupération de Token</h1>
    
    <?php
    // Récupérer le token depuis l'URL
    $token = $_GET['token'] ?? '';

    // Afficher le token
    echo "Token récupéré : " . $token;
    ?>
    
</body>
</html>