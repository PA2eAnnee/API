<?php
require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../entities/sites/get-sites.php";

try {
    $body = getBody();
    $sites = getSite($body);

    echo jsonResponse(200, ["X-School" => "ESGI"], [
        "success" => true,
        "sites" => $sites
    ]);
} catch (Exception $exception) {
    echo jsonResponse(500, [], [
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}