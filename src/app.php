<?php

use App\services\router\Router;
use App\controllers\ErrorController;
use App\exceptions\AppException;
use App\exceptions\UnknownException;
use App\exceptions\NotFoundException;
use App\exceptions\SystemException;
use App\exceptions\ForbiddenException;

session_start();

$page = isset($_GET['page']) ? $_GET['page'] : null;

try {
    (new Router())->route($page);
} 
catch (\PDOException $e) {
    // (new ErrorController())->system();
    throw new SystemException();
} catch (AppException $e) {
    (new ErrorController())->showError($e);
} catch (\Exception $e) {
    $error = new UnknownException();
    (new ErrorController())->showError($error);
}





// catch (NotFoundException $e) {
//     // (new ErrorController())->notFound();
// }
// catch (SystemException $e) {
//     (new ErrorController())->system();
// }
// catch (ForbiddenException $e) {
//     (new ErrorController())->forbidden();
// }
// catch (\Exception $e) {
//     (new ErrorController())->unknown();
// }

