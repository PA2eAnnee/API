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
        if (!in_array($columnName, $authorizedColumns)) {
            continue;
        }

        $where[] = "$columnName = :$columnName";
        $sanitizedColumns[$columnName] = htmlspecialchars($columnValue);
    }

    $whereClause = count($where) > 0 ? implode(" AND ", $where) : "1";

    $databaseConnection = getDatabaseConnection();
    $getUserQuery = $databaseConnection->prepare("SELECT * FROM RecipeIngredient WHERE $whereClause;");
    $getUserQuery->execute($sanitizedColumns);

    $recipeIngredients = $getUserQuery->fetchAll(PDO::FETCH_ASSOC);


    $lessons = [];
    foreach ($recipeIngredients as $participatedLesson) {
        $lesson = getIngredients(['id' => $participatedLesson['ingredientid']]);
        $lessonWithQuantity = $lesson[0];
        $lessonWithQuantity['Quantity'] = $participatedLesson['quantity'];
        $lessonWithQuantity['unity'] = $participatedLesson['unity'];
        $lessons[] = $lessonWithQuantity;
    }
    
    
    
    return $lessons;
}

