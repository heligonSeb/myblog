<?php

use App\services\router\Router;
use App\controllers\ErrorController;
use App\exceptions\AppException;
use App\exceptions\UnknownException;
use App\exceptions\SystemException;

session_start();

$page = isset($_GET['page']) ? $_GET['page'] : null;

try {
    (new Router())->route($page);
} 
catch (\PDOException $e) {
    throw new SystemException();
} catch (AppException $e) {
    (new ErrorController())->showError($e);
} catch (\Exception $e) {
    $error = new UnknownException();
    (new ErrorController())->showError($error);
}

