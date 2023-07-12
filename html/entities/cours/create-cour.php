<?php

function createCours(string $name, string $description, string $type, string $course_date, string $course_enddate, string $user_id): int
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
        INSERT INTO COURSE(
            name,
            description,
            price,
            type,
            course_date,
            course_enddate,
            user_id
        ) VALUES (
            :name,
            :description,
            :price,
            :type,
            :course_date,
            :course_enddate,
            :user_id
        );
    ");

    // Calculer la différence en heures
    $start = new DateTime($course_date);
    $end = new DateTime($course_enddate);
    $diff = $end->diff($start);
    $hours = $diff->h;
    $hours += $diff->days * 24;

    // Calculer le prix en fonction du nombre d'heures
    $hourlyRate = 50; // Tarif horaire
    $price = $hours * $hourlyRate;
    $roundedPrice = ceil($price);

    $createUserQuery->execute([
        ":name" => htmlspecialchars($name),
        ":description" => htmlspecialchars($description),
        ":price" => htmlspecialchars($roundedPrice),
        ":type" => htmlspecialchars($type),
        ":course_date" => htmlspecialchars($course_date),
        ":course_enddate" => htmlspecialchars($course_enddate),
        ":user_id" => htmlspecialchars($user_id)
    ]);

    return ($price);
}
