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
    <?php
    $redirectURL = 'page-de-connexion.html';
    if ($finis === true) {
        echo '<meta http-equiv="refresh" content="5;url=https://cookmaster.best">';
        echo '<script>
                setTimeout(function() {
                    document.getElementById("redirect-message").textContent = "Redirection dans 2 secondes...";
                    setTimeout(function() {
                        document.getElementById("redirect-message").textContent = "Redirection dans 1 seconde...";
                        setTimeout(function() {
                            window.location.href = "https://cookmaster.best";
                        }, 1000);
                    }, 1000);
                }, 1000);
              </script>';
        echo '<style>
                h1::after {
                    content: none;
                }
              </style>';
        echo '<h1>Votre mail a été validé !</h1>';
    } else {
        echo '<meta http-equiv="refresh" content="5;url=' . $redirectURL . '">';
    }
    ?>
</head>
<body>
    <?php
    if ($finis !== true) {
        echo '<h1>Validation de votre email en cours...</h1>';
        echo '<p>Vous serez redirigé(e) dans un instant vers la page de connexion.</p>';
    }
    ?>
</body>
</html>
