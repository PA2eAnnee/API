<?php

require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../libraries/parameters.php";
require_once __DIR__ . "/../../entities/diplomes/delete-diplome.php";

try {
    $parameters = getParametersForRoute("/diplomes/:diplome");
    $id = $parameters["diplome"];
    deleteDiplomes($id);

    echo jsonResponse(200, [], [
        "success" => true,
        "message" => "deleted"
    ]);
} catch (Exception $exception) {
    echo jsonResponse(200, [], [
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}
