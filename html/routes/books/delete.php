<?php

require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../libraries/parameters.php";
require_once __DIR__ . "/../../entities/books/delete-book.php";
require_once __DIR__ . "/../../libraries/authorization.php";




if (authorization(0)){

    try {
        $body = getBody();
        deleteBook($body["id_user"], $body["id_space"],$body["book_date"] );
    
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
    

}else{
    echo jsonResponse(400, [], [
        "success" => false,
        "error" => "Vous n'avez pas les droit néccessaire pour effectuer cette action"
    ]);
}