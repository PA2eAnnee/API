<?php

function createEvent(string $description, string $type, string $max_members, string $price, string $start_date, string $end_date, string $id_site, ?string $recipe_id): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
    INSERT INTO EVENT (description, type, max_members, price, start_date, end_date, id_site, recipe_id) VALUES
    (:description, :type, :max_members, :price, :start_date, :end_date, :id_site, :recipe_id);
    ");
 
    $parameters = [
        ":description" => htmlspecialchars($description),
        ":type" => htmlspecialchars($type),
        ":max_members" => htmlspecialchars($max_members),
        ":price" => htmlspecialchars($price),
        ":start_date" => htmlspecialchars($start_date),
        ":end_date" => htmlspecialchars($end_date),
        ":id_site" => htmlspecialchars($id_site),
        ":recipe_id" => ($recipe_id !== null) ? htmlspecialchars($recipe_id) : null
    ];

    $createUserQuery->execute($parameters);
}



