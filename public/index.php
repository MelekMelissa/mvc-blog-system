<?php

session_start();

if (!isset($_SESSION['csrf_token'])) {

    $_SESSION['csrf_token'] =
        bin2hex(random_bytes(32));
}

require_once
'../app/Core/Database.php';

require_once
'../app/Core/Router.php';

$router = new Router();

require_once
'../config/routes.php';

$router->dispatch();