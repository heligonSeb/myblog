<?php

use App\controllers\ErrorController;
use App\exceptions\AppException;
use App\exceptions\SystemException;
use App\exceptions\UnknownException;
use App\services\router\Router;
use Symfony\Component\Dotenv\Dotenv;

session_start();

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/../.env');

$page = isset($_GET['page']) ? $_GET['page'] : null;

try {
    (new Router())->route($page);
} catch (\PDOException $e) {
    throw new SystemException();
} catch (AppException $e) {
    (new ErrorController())->showError($e);
} catch (\Exception $e) {
    $error = new UnknownException();
    (new ErrorController())->showError($error);
}
