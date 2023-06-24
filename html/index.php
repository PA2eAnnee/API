<?php


ini_set("display_errors", 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header("Access-Control-Allow-Origin: http://cookmaster.local");
    header("Access-Control-Allow-Methods: GET, POST, PATCH, DELETE");
    header("Access-Control-Allow-Headers: Content-Type");
    header("HTTP/1.1 200 OK");
    exit();
}


require_once __DIR__ . "/libraries/path.php";
require_once __DIR__ . "/libraries/method.php";
require_once __DIR__ . "/libraries/response.php";


if (isPath("users")) {
    if (isGetMethod()) {
        require_once __DIR__ . "/routes/users/get.php";
        die();
    }

    if (isPostMethod()) {
        require_once __DIR__ . "/routes/users/post.php";
        die();
    }
}

if (isPath("users/:user")) {
    if (isDeleteMethod()) {
        require_once __DIR__ . "/routes/users/delete.php";
        die();
    }

    if (isPatchMethod()) {
        require_once __DIR__ . "/routes/users/patch.php";
        die();
    }
}

if(isPath("sites")) {
    if (isGetMethod()) {
        require_once __DIR__ . "/routes/sites/get.php";
        die();
    }

    if(isPostMethod()) {
        require_once __DIR__ . "/routes/sites/post.php";
        die();
    }
}

if (isPath("sites/:site")) {
    if (isDeleteMethod()) {
        require_once __DIR__ . "/routes/sites/delete.php";
        die();
    }

    if (isPatchMethod()) {
        require_once __DIR__ . "/routes/sites/patch.php";
        die();
    }
}

if(isPath("articles")) {
    if (isGetMethod()) {
        require_once __DIR__ . "/routes/articles/get.php";
        die();
    }

    if(isPostMethod()) {
        require_once __DIR__ . "/routes/articles/post.php";
        die();
    }
}

if (isPath("articles/:article")) {
    if (isDeleteMethod()) {
        require_once __DIR__ . "/routes/articles/delete.php";
        die();
    }

    if (isPatchMethod()) {
        require_once __DIR__ . "/routes/articles/patch.php";
        die();
    }
}

if(isPath("spaces")) {
    if (isGetMethod()) {
        require_once __DIR__ . "/routes/spaces/get.php";
        die();
    }

    if(isPostMethod()) {
        require_once __DIR__ . "/routes/spaces/post.php";
        die();
    }
}

if (isPath("spaces/:space")) {
    if (isDeleteMethod()) {
        require_once __DIR__ . "/routes/spaces/delete.php";
        die();
    }

    if (isPatchMethod()) {
        require_once __DIR__ . "/routes/spaces/patch.php";
        die();
    }
}

if(isPath("conversations")) {
    if (isGetMethod()) {
        require_once __DIR__ . "/routes/conversations/get.php";
        die();
    }

    if(isPostMethod()) {
        require_once __DIR__ . "/routes/conversations/post.php";
        die();
    }
}

if (isPath("conversations/:conversation")) {
    if (isDeleteMethod()) {
        require_once __DIR__ . "/routes/conversations/delete.php";
        die();
    }

    if (isPatchMethod()) {
        require_once __DIR__ . "/routes/conversations/patch.php";
        die();
    }
}

if(isPath("messages")) {
    if (isGetMethod()) {
        require_once __DIR__ . "/routes/messages/get.php";
        die();
    }

    if(isPostMethod()) {
        require_once __DIR__ . "/routes/messages/post.php";
        die();
    }
}

if (isPath("messages/:message")) {
    if (isDeleteMethod()) {
        require_once __DIR__ . "/routes/messages/delete.php";
        die();
    }

    if (isPatchMethod()) {
        require_once __DIR__ . "/routes/messages/patch.php";
        die();
    }
}

if(isPath("tickets")) {
    if (isGetMethod()) {
        require_once __DIR__ . "/routes/tickets/get.php";
        die();
    }

    if(isPostMethod()) {
        require_once __DIR__ . "/routes/tickets/post.php";
        die();
    }
}

if (isPath("tickets/:ticket")) {
    if (isDeleteMethod()) {
        require_once __DIR__ . "/routes/tickets/delete.php";
        die();
    }

    if (isPatchMethod()) {
        require_once __DIR__ . "/routes/tickets/patch.php";
        die();
    }
}

if(isPath("orders")) {
    if (isGetMethod()) {
        require_once __DIR__ . "/routes/orders/get.php";
        die();
    }

    if(isPostMethod()) {
        require_once __DIR__ . "/routes/orders/post.php";
        die();
    }
}

if (isPath("orders/:order")) {
    if (isDeleteMethod()) {
        require_once __DIR__ . "/routes/orders/delete.php";
        die();
    }

    if (isPatchMethod()) {
        require_once __DIR__ . "/routes/orders/patch.php";
        die();
    }
}

if(isPath("followups")) {
    if (isGetMethod()) {
        require_once __DIR__ . "/routes/followups/get.php";
        die();
    }

    if(isPostMethod()) {
        require_once __DIR__ . "/routes/followups/post.php";
        die();
    }
}

if (isPath("followups/:followup")) {
    if (isDeleteMethod()) {
        require_once __DIR__ . "/routes/followups/delete.php";
        die();
    }

    if (isPatchMethod()) {
        require_once __DIR__ . "/routes/followups/patch.php";
        die();
    }
}

if(isPath("events")) {

    if(isPostMethod()) {
        require_once __DIR__ . "/routes/events/post.php";
        die();
    }
}

if(isPath("getevents")) {
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/events/get.php";
        die();
    }
}

if (isPath("events/:event")) {
    if (isDeleteMethod()) {
        require_once __DIR__ . "/routes/events/delete.php";
        die();
    }

    if (isPatchMethod()) {
        require_once __DIR__ . "/routes/events/patch.php";
        die();
    }
}

if(isPath("goestos")) {
    if(isPostMethod()) {
        require_once __DIR__ . "/routes/goestos/post.php";
        die();
    }

}

if(isPath("deletegoestos")) {
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/goestos/delete.php";
        die();
    }

}



if(isPath("getgoestos")) {
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/goestos/get.php";
        die();
    }

}

if(isPath("contains")) {
    if (isGetMethod()) {
        require_once __DIR__ . "/routes/contains/get.php";
        die();
    }

    if(isPostMethod()) {
        require_once __DIR__ . "/routes/contains/post.php";
        die();
    }

    if (isDeleteMethod()) {
        require_once __DIR__ . "/routes/contains/delete.php";
        die();
    }

}

if(isPath("books")) {
    if (isGetMethod()) {
        require_once __DIR__ . "/routes/books/get.php";
        die();
    }

    if(isPostMethod()) {
        require_once __DIR__ . "/routes/books/post.php";
        die();
    }

    if (isDeleteMethod()) {
        require_once __DIR__ . "/routes/books/delete.php";
        die();
    }
}

if(isPath("connection")) {
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/connection/post.php";
        die();
    }

}

if (isPath("tokens")) {
    if (isGetMethod()) {
        require_once __DIR__ . "/routes/tokens/get.php";
        die();
    }

    if (isPostMethod()) {
        require_once __DIR__ . "/routes/tokens/post.php";
        die();
    }
}

if (isPath("tokens/:token")) {
    if (isDeleteMethod()) {
        require_once __DIR__ . "/routes/tokens/delete.php";
        die();
    }
}

if(isPath("connectiontoken")) {
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/connectiontoken/get.php";
        die();
    }

}


if (isPath("recipe")) {

    if (isPostMethod()) {
        require_once __DIR__ . "/routes/recipe/post.php";
        die();
    }
}

if (isPath("recipes/:recipe")) {
    if (isDeleteMethod()) {
        require_once __DIR__ . "/routes/recipe/delete.php";
        die();
    }

    if (isPatchMethod()) {
        require_once __DIR__ . "/routes/recipe/patch.php";
        die();
    }
}

if (isPath("getrecipe")) {
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/recipe/get.php";
        die();
    }
}

if (isPath("ingredient")) {

    if (isPostMethod()) {
        require_once __DIR__ . "/routes/ingredients/post.php";
        die();
    }
}

if (isPath("ingredients/:ingredient")) {
    if (isDeleteMethod()) {
        require_once __DIR__ . "/routes/ingredients/delete.php";
        die();
    }

    if (isPatchMethod()) {
        require_once __DIR__ . "/routes/ingredients/patch.php";
        die();
    }
}

if (isPath("getingredient")) {
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/ingredients/get.php";
        die();
    }
}

if (isPath("recipeIngredient")) {

    if (isPostMethod()) {
        require_once __DIR__ . "/routes/recipeIngredient/post.php";
        die();
    }
}

if (isPath("getrecipeIngredient")) {
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/recipeIngredient/get.php";
        die();
    }
}

if(isPath("register")) {
    if(isPostMethod()) {
        require_once __DIR__ . "/routes/register/post.php";
        die();
    }
}



echo jsonResponse(404, [], [
    "success" => false,
    "message" => "Route not found"
]);
