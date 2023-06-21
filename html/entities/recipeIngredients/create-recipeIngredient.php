<?php

function createRecipeIngredients(string $recipeID, string $ingredientID, string $quantity): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
        INSERT INTO RecipeIngredient(
            recipeID,
            ingredientID,
            quantity
        ) VALUES (
            :recipeID,
            :ingredientID,
            :quantity
        );
    ");

    $createUserQuery->execute([
        ":recipeID" => htmlspecialchars($recipeID),
        ":ingredientID" => htmlspecialchars($ingredientID),
        ":quantity" => htmlspecialchars($quantity)
    ]);
}
