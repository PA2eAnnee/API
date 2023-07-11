<?php
require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../entities/articles/get-articles.php";

try {

// Adresse e-mail de l'expéditeur
$from = 'contact@cookmaster.best';

// Adresse e-mail du destinataire
$to = 'andreimalicek@gmail.com';

// Sujet de l'e-mail
$subject = 'Valider votre mot de passe !';

// Charger le contenu du template
$template = file_get_contents(__DIR__ . '/../../template/verifEmail.html');

// Remplacer les variables du template avec les valeurs souhaitées
$variables = array(
    '{name}' => 'John Doe',
    '{message}' => 'Ceci est le contenu de l\'e-mail.',
);

$body = strtr($template, $variables);

// En-têtes de l'e-mail
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: $from" . "\r\n";

// Envoyer l'e-mail
if (mail($to, $subject, $body, $headers)) {
    echo 'L\'e-mail a été envoyé avec succès.';
} else {
    echo 'Une erreur est survenue lors de l\'envoi de l\'e-mail.';
}


    $body = getBody();
    $articles = getArticle($body);

    echo jsonResponse(200, ["X-School" => "ESGI"], [
        "success" => true,
        "articles" => $articles
    ]);
} catch (Exception $exception) {
    echo jsonResponse(500, [], [
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}