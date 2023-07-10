<?php
require_once __DIR__ . "/../ingredients/get-ingredients.php";
function getRecipeIngredients(?array $columns = null): array
{
    if (!is_array($columns)) {
        $columns = [];
    }

    require_once __DIR__ . "/../../database/connection.php";

    $authorizedColumns = ["recipeid", "ingredientid", "quantity"];

    $where = [];
    $sanitizedColumns = [];

    foreach ($columns as $columnName => $columnValue) {
        if (!in_array($columnName, $authorizedColumns) )  {
            continue;
        } 

        $where[] = "$columnName = :$columnName";
        $sanitizedColumns[":$columnName"] = htmlspecialchars($columnValue);
    }

    $whereClause = count($where) > 0 ? implode(" AND ", $where) : "1";

    $databaseConnection = getDatabaseConnection();
    $getIngredientsQuery = $databaseConnection->prepare("SELECT * FROM RecipeIngredient WHERE $whereClause");
    $getIngredientsQuery->execute($sanitizedColumns);

    $recipeIngredients = $getIngredientsQuery->fetchAll(PDO::FETCH_ASSOC);

    $ingredients = [];
    foreach ($recipeIngredients as $recipeIngredient) {
        $ingredient = getIngredients(['id' => $recipeIngredient['ingredientID']]);
        $ingredients[] = $ingredient[0];
    }

    return $ingredients;
}


