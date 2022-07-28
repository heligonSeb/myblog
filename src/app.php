<?php

use App\services\router\Router;
use App\controllers\ErrorController;
use App\exceptions\NotFoundException;
use App\exceptions\SystemException;

session_start();

$page = isset($_GET['page']) ? $_GET['page'] : null;

try {
    (new Router())->route($page);
} 
catch (\PDOException $e) {
    (new ErrorController())->system();
}
catch (NotFoundException $e) {
    (new ErrorController())->notFound();
}
catch (SystemException $e) {
    (new ErrorController())->system();
}
catch (\Exception $e) {
    (new ErrorController())->unknown();
}


