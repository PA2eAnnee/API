<?php

function createUser(string $name, string $first_name, string $password, string $username, string $email): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
        INSERT INTO USERS(
            name,
            first_name,
            password,
            username,
            email,
            creation_time
        ) VALUES (
            :name,
            :first_name,
            :passwords,
            :username,
            :email,
            CURRENT_TIMESTAMP
        );
    ");

    $createUserQuery->execute([
        ":name" => htmlspecialchars($name),
        ":first_name" => htmlspecialchars($first_name),
        ":username" => htmlspecialchars($username),
        ":email" => htmlspecialchars($email),
        ":passwords" => password_hash(htmlspecialchars($password), PASSWORD_BCRYPT),
        ":role" => htmlspecialchars($role),
        ":subscription" => htmlspecialchars($subscription),
        ":picture" => htmlspecialchars($picture)
    ]);
}
