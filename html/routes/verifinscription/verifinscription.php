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
    <script>
        // Wait for the document to load
        document.addEventListener("DOMContentLoaded", function() {
            <?php
            require_once __DIR__ . "/../../entities/tokens/get-tokens.php";

            // Récupérer le token depuis l'URL
            $token = $_GET['token'] ?? '';
            $id = getToken(["token" => getBearerToken()])[0]["user_id"];
            $finis = updateUser($id, ["status" => "ACTIVE"]);
            ?>

            // Check if $finis is true
            <?php if ($finis): ?>
            // Change the heading text and start the countdown
            var heading = document.querySelector("h1");
            heading.textContent = "Votre email a été validé !";

            var countdown = 3;
            var redirectTimer = setInterval(function() {
                var redirectText = document.querySelector("p");
                redirectText.textContent = "Redirection dans " + countdown + " seconde" + (countdown === 1 ? "" : "s");
                countdown--;

                if (countdown < 0) {
                    clearInterval(redirectTimer);
                    // Manually redirect to "page-de-connexion.html"
                    window.location.href = "page-de-connexion.html";
                }
            }, 1000);
            <?php endif; ?>
        });
    </script>
</head>
<body>
    <h1>Validation de votre email en cours...</h1>
    <p>Vous serez redirigé(e) dans 3 secondes vers la page de connexion.</p>
</body>
</html>
