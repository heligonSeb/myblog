<?php

use App\services\router\Router;

$page = isset($_GET['page']) ? $_GET['page'] : null;

(new Router())->route($page);


