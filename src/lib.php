<?php


/**
 * Return an Error message with session
 * @param {String}
 */
function ErrorMessage($message) {
    $_SESSION['errorMessage'] = $message;

    header('Location: /public');
    exit(0);
}