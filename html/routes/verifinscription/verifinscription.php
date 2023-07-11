<!DOCTYPE html>
<html>
<head>
    <title>Validation de votre email en cours...</title>
    <style>
        @keyframes blink {
            0% { opacity: 0; }
            50% { opacity: 1; }
            100% { opacity: 0; }
        }

        h1::after {
            content: '...';
            animation: blink 1s infinite;
        }
    </style>
</head>
<body>
    <h1>Validation de votre email en cours</h1>
    
    <?php
    // Récupérer le token depuis l'URL
    $token = $_GET['token'] ?? '';

    // Afficher le token
    echo "Token récupéré : " . $token;
    ?>
    
</body>
</html>
