<?php


ini_set("display_errors", 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header("HTTP/1.1 200 OK");
    exit();
}


require_once __DIR__ . "/libraries/path.php";
require_once __DIR__ . "/libraries/method.php";
require_once __DIR__ . "/libraries/response.php";


if (isPath("users")) {

    if (isPostMethod()) {
        require_once __DIR__ . "/routes/users/post.php";
        die();
    }
}

if (isPath("getusers")) {
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/users/get.php";
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

    if(isPostMethod()) {
        require_once __DIR__ . "/routes/sites/post.php";
        die();
    }
}

if(isPath("getsites")) {
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/sites/get.php";
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

    if(isPostMethod()) {
        require_once __DIR__ . "/routes/articles/post.php";
        die();
    }
}

if(isPath("getarticles")) {
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/articles/get.php";
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

    if(isPostMethod()) {
        require_once __DIR__ . "/routes/spaces/post.php";
        die();
    }
}

if(isPath("getspaces")) {
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/spaces/get.php";
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

    if(isPostMethod()) {
        require_once __DIR__ . "/routes/conversations/post.php";
        die();
    }
}

if(isPath("getconversations")) {
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/conversations/get.php";
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

    if(isPostMethod()) {
        require_once __DIR__ . "/routes/messages/post.php";
        die();
    }
}

if(isPath("getmessages")) {
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/messages/get.php";
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

    if(isPostMethod()) {
        require_once __DIR__ . "/routes/tickets/post.php";
        die();
    }
}

if(isPath("gettickets")) {
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/tickets/get.php";
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

    if(isPostMethod()) {
        require_once __DIR__ . "/routes/orders/post.php";
        die();
    }
}

if(isPath("getorders")) {
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/orders/get.php";
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

    if(isPostMethod()) {
        require_once __DIR__ . "/routes/followups/post.php";
        die();
    }
}

if(isPath("getfollowups")) {
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/followups/get.php";
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

if(isPath("getmygoestos")) {
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/goestos/getmy.php";
        die();
    }

}

if(isPath("gethergoestos")) {
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/goestos/gether.php";
        die();
    }

}

if(isPath("contains")) {

    if(isPostMethod()) {
        require_once __DIR__ . "/routes/contains/post.php";
        die();
    }

    if (isDeleteMethod()) {
        require_once __DIR__ . "/routes/contains/delete.php";
        die();
    }

}

if(isPath("getcontains")) {
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/contains/get.php";
        die();
    }

}

if(isPath("books")) {
    if(isPostMethod()) {
        require_once __DIR__ . "/routes/books/post.php";
        die();
    }

    if (isDeleteMethod()) {
        require_once __DIR__ . "/routes/books/delete.php";
        die();
    }
}

if(isPath("getbooks")) {
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/books/get.php";
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

    if (isPostMethod()) {
        require_once __DIR__ . "/routes/tokens/post.php";
        die();
    }
}

if (isPath("gettokens")) {
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/tokens/get.php";
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


if (isPath("diplomes")) {

    if (isPostMethod()) {
        require_once __DIR__ . "/routes/diplomes/post.php";
        die();
    }
}

if (isPath("diplomes/:diplome")) {
    if (isDeleteMethod()) {
        require_once __DIR__ . "/routes/diplomes/delete.php";
        die();
    }

    if (isPatchMethod()) {
        require_once __DIR__ . "/routes/diplomes/patch.php";
        die();
    }
}

if (isPath("getdiplomes")) {
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/diplomes/get.php";
        die();
    }
}

if (isPath("stripeapi")) {
    if (isPostMethod()) {
        require_once __DIR__ . "/stripe_api.php"; 
        die();
    }
}

if (isPath("cours")) {

    if (isPostMethod()) {
        require_once __DIR__ . "/routes/cours/post.php";
        die();
    }
}

if (isPath("cours/:cour")) {
    if (isDeleteMethod()) {
        require_once __DIR__ . "/routes/cours/delete.php";
        die();
    }

    if (isPatchMethod()) {
        require_once __DIR__ . "/routes/cours/patch.php";
        die();
    }
}

if (isPath("getcours")) {
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/cours/get.php";
        die();
    }
}

if (isPath("lessons")) {

    if (isPostMethod()) {
        require_once __DIR__ . "/routes/lessons/post.php";
        die();
    }
}

if (isPath("lessons/:lesson")) {
    if (isDeleteMethod()) {
        require_once __DIR__ . "/routes/lessons/delete.php";
        die();
    }

    if (isPatchMethod()) {
        require_once __DIR__ . "/routes/lessons/patch.php";
        die();
    }
}

if (isPath("getlessons")) {
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/lessons/get.php";
        die();
    }
}

if(isPath("getparticipate_lessons")) {
    if(isPostMethod()) {
        require_once __DIR__ . "/routes/participate_lessons/get.php";
        die();
    }

}

if(isPath("participate_lessons")) {
    if(isPostMethod()) {
        require_once __DIR__ . "/routes/participate_lessons/post.php";
        die();
    }

}

if(isPath("deleteparticipate_lessons")) {
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/participate_lessons/delete.php";
        die();
    }

}


if(isPath("getparticipate_courses")) {
    if(isPostMethod()) {
        require_once __DIR__ . "/routes/participate_courses/get.php";
        die();
    }

}

if(isPath("participate_courses")) {
    if(isPostMethod()) {
        require_once __DIR__ . "/routes/participate_courses/post.php";
        die();
    }

}

if(isPath("deleteparticipate_courses")) {
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/participate_courses/delete.php";
        die();
    }

}

if(isPath("getrequire_courses")) {
    if(isPostMethod()) {
        require_once __DIR__ . "/routes/participate_courses/get.php";
        die();
    }

}

if(isPath("require_courses")) {
    if(isPostMethod()) {
        require_once __DIR__ . "/routes/require_courses/post.php";
        die();
    }

}

if(isPath("deleterequire_courses")) {
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/require_courses/delete.php";
        die();
    }

}

if(isPath("getrequire_lessons")) {
    if(isPostMethod()) {
        require_once __DIR__ . "/routes/participate_lessons/get.php";
        die();
    }

}

if(isPath("require_lessons")) {
    if(isPostMethod()) {
        require_once __DIR__ . "/routes/require_lessons/post.php";
        die();
    }

}

if(isPath("deleterequire_lessons")) {
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/require_lessons/delete.php";
        die();
    }

}

if(isPath("getrequire_events")) {
    if(isPostMethod()) {
        require_once __DIR__ . "/routes/require_events/get.php";
        die();
    }

}

if(isPath("require_events")) {
    if(isPostMethod()) {
        require_once __DIR__ . "/routes/require_events/post.php";
        die();
    }

}

if(isPath("deleterequire_events")) {
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/require_events/delete.php";
        die();
    }

}

if(isPath("pictures")) {
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/picture/post.php";
        die();
    }

}




echo jsonResponse(404, [], [
    "success" => false,
    "message" => "Route not found"
]);



phpinfo();
