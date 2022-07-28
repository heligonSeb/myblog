<?php


function showErrorArray($e) {
    if(DEBUG === true) {
        echo '<pre>';
        var_dump($e);
        echo '</pre>';
    }
}

/**
 * Return an Error message with session
 * @param {String}
 */
function ErrorMessage($message) {
    $_SESSION['errorMessage'] = $message;

    header('Location: /public');
    exit;
}