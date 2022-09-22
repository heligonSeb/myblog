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

/* CONFIGURATION DE LA BASE DE DONNEE */
define('DB_HOST', $_ENV['DB_HOST']);
define('DB_USER', $_ENV['DB_USER']);
define('DB_PASSWORD', $_ENV['DB_PASSWORD']);
define('DB_NAME', $_ENV['DB_NAME']);
define('ADMIN_EMAIL', $_ENV['ADMIN_EMAIL']);

/* CONFIG SITE */
define('DEBUG', $_ENV['DEBUG']);
if (DEBUG) {
    ini_set('display_errors', 1);
}

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
