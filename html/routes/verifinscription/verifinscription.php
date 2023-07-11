<!DOCTYPE html>
<html>
<head>
    <title>Validation E-mail</title>
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
    <meta http-equiv="refresh" content="5;url=https://cookmaster.best">
</head>
<body>
    <h1>Validation de votre email en cours ...</h1>
    <p>Vous serez redirigé(e) dans un instant vers la page de connexion.</p>
    
    <?php
    require_once __DIR__ . "/../../entities/tokens/get-tokens.php";



    // Récupérer le token depuis l'URL
    $token = $_GET['token'] ?? '';

    if($token !==""){
        $id= getToken(["token" => $token])[0]["user_id"];
        updateUser((string)$id,["status" => "ACTIVE"]);
    }



    ?>
    
</body>
</html>
