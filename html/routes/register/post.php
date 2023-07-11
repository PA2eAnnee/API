<?php

require_once __DIR__ . "/../../entities/users/create-user.php";
require_once __DIR__ . "/../../entities/users/get-users.php";
require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../database/connection.php";

$body = getBody();

if (!isset($body["name"]) || empty($body["name"])) {
    echo jsonResponse(400, [], [
        "success" => false,
        "message" => "Please provide your name",
        "code" => "miss_name"
    ]);
    die();
}

if (!isset($body["first_name"]) || empty($body["first_name"])) {
    echo jsonResponse(400, [], [
        "success" => false,
        "message" => "Please provide your first name",
        "code" => "miss_fname"
    ]);
    die();
}

if (!isset($body["username"]) || empty($body["username"])) {
    echo jsonResponse(400, [], [
        "success" => false,
        "message" => "Please provide your username",
        "code" => "miss_uname"
    ]);
    die();
}

if (!isset($body["email"]) || empty($body["email"])) {
    echo jsonResponse(400, [], [
        "success" => false,
        "message" => "Please provide your email",
        "code" => "miss_email"
    ]);
    die();
}

if (!filter_var($body["email"], FILTER_VALIDATE_EMAIL)) {
    echo jsonResponse(400, [], [
        "success" => false,
        "message" => "Email is not in a valid format",
        "code" => "wrong_email_fmt"
    ]);
    die();
}

if (!isset($body["password"]) || empty($body["password"])) {
    echo jsonResponse(400, [], [
        "success" => false,
        "message" => "Please provide your password",
        "code" => "miss_passwd"
    ]);
    die();
}

if (strlen($body["password"]) < 8) {
    echo jsonResponse(400, [], [
        "success" => false,
        "message" => "Password is too short",
        "code" => "shrt_passwd"
    ]);
    die();
}

$uppercase = preg_match('@[A-Z]@', $body["password"]);
$lowercase = preg_match('@[a-z]@', $body["password"]);
$number = preg_match('@[0-9]@', $body["password"]);
$specialChars = preg_match('@[^\w]@', $body["password"]);

if (!$uppercase || !$lowercase || !$number || !$specialChars) {
    echo jsonResponse(400, [], [
        "success" => false,
        "message" => "Password should contain at least 1 uppercase, 1 lowercase, 1 number, and 1 special character",
        "code" => "strght_passwd"
    ]);
    die();
}

// Check if email already exists
$existingUsers = getUser(["email" => $body["email"]]);

if (!empty($existingUsers)) {
    echo jsonResponse(400, [], [
        "success" => false,
        "message" => "Email already exists",
        "code" => "existing_email"
    ]);
    die();
}

$existingUsers = getUser(["username" => $body["username"]]);

if (!empty($existingUsers)) {
    echo jsonResponse(400, [], [
        "success" => false,
        "message" => "Username already exists",
        "code" => "existing_username"
    ]);
    die();
}


// Call the createUser function to create the user
$userId = createUser($body["name"], $body["first_name"], $body["password"], $body["username"], $body["email"]);

$length = 32; // longueur de la chaîne en octets
$randomBytes = random_bytes($length);
$randomString = bin2hex($randomBytes);

createToken($userId,$randomString);

// Adresse e-mail de l'expéditeur
$from = 'contact@cookmaster.best';

// Adresse e-mail du destinataire
$to = 'andrei-malicek@outlook.fr';

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

echo jsonResponse(200, [], [
    "success" => true,
    "message" => "Account created",
    "code" => "all_ok"
]);
