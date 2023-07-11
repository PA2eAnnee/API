<!DOCTYPE html>
<html>
<head>
    <title>Validation de votre email en cours...</title>
    <script>
        window.onload = function() {
            var title = document.title;
            var dots = '';

            setInterval(function() {
                if (dots.length < 3) {
                    dots += '.';
                } else {
                    dots = '';
                }

                document.title = title + dots;
            }, 500);
        };
    </script>
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
