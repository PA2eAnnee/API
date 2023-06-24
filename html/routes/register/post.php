<?php

require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../libraries/body.php";

$body = getBody();

if(!isset($body["name"]) || empty($body["name"])) {
    echo jsonResponse(400, [], [
        "success" => false,
        "message" => "Please precise your name",
        "code" => "miss_name"
    ]);
    die();
}

if(!isset($body["first_name"]) || empty($body["first_name"])) {
    echo jsonResponse(400, [], [
        "success" => false,
        "message" => "Please precise your first name",
        "code" => "miss_fname"
    ]);
    die();
}

if(!isset($body["username"]) || empty($body["username"])) {
    echo jsonResponse(400, [], [
        "success" => false,
        "message" => "Please precise your username",
        "code" => "miss_uname"
    ]);
    die();
}

if(!isset($body["email"]) || empty($body["email"])) {
    echo jsonResponse(400, [], [
        "success" => false,
        "message" => "Please precise your email",
        "code" => "miss_email"
    ]);
    die();
}

if(!filter_var($body["email"], FILTER_VALIDATE_EMAIL)){
    echo jsonResponse(400, [], [
        "success" => false,
        "message" => "Email is not in valid format",
        "code" => "wrong_email_fmt"
    ]);
    die();
}

if(!isset($body["password"]) || empty($body["password"])) {
    echo jsonResponse(400, [], [
        "success" => false,
        "message" => "Please precise your password",
        "code" => "miss_passwd"
    ]);
    die();
}

if(strlen($body["password"]) < 8) {
    echo jsonResponse(400, [], [
        "success" => false,
        "message" => "Too short password",
        "code" => "shrt_passwd"
    ]);
    die();
}

$uppercase = preg_match('@[A-Z]@', $body["password"]);
$lowercase = preg_match('@[a-z]@', $body["password"]);
$number    = preg_match('@[0-9]@', $body["password"]);
$specialChars = preg_match('@[^\w]@', $body["password"]);

if(!$uppercase || !$lowercase || !$number || !$specialChars) {
    echo jsonResponse(400, [], [
        "success" => false,
        "message" => "Need at least 1 uppercase, 1 lowercase, 1 number and 1 special char",
        "code" => "strght_passwd"
    ]);
    die();
}

echo jsonResponse(200, [], [
    "success" => true,
    "message" => "Account created",
    "code" => "all_ok"
]);

