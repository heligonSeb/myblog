<?php

use App\services\router\Router;

session_start();

$page = isset($_GET['page']) ? $_GET['page'] : null;

(new Router())->route($page);


