<?php

function createUser(string $name, string $first_name, string $password, string $username, string $email, string $role, string $subscription, string $picture): void
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
            role,
            subscription,
            picture,
            creation_time
        ) VALUES (
            :name,
            :first_name,
            :password,
            :username,
            :email,
            :role,
            :subscription,
            :picture,
            NOW()
        );
    ");

    $createUserQuery->execute([
        ":name" => htmlspecialchars($name),
        ":first_name" => htmlspecialchars($first_name),
        ":username" => htmlspecialchars($username),
        ":email" => htmlspecialchars($email),
        ":password" => password_hash(htmlspecialchars($password), PASSWORD_BCRYPT),
        ":role" => htmlspecialchars($role),
        ":subscription" => htmlspecialchars($subscription),
        ":picture" => htmlspecialchars($picture)
    ]);
}
