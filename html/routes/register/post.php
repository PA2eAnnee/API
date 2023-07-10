<?php

require_once __DIR__ . "/../entities/users/create_user.php";
require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../libraries/body.php";

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

// Call the createUser function to create the user
createUser($body["name"], $body["first_name"], $body["password"], $body["username"], $body["email"]);

echo jsonResponse(200, [], [
    "success" => true,
    "message" => "Account created",
    "code" => "all_ok"
]);
