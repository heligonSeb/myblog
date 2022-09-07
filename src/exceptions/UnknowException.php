<?php


namespace App\exceptions;

class UnknownException extends \Exception implements AppException {
    /**
     * Return the picture name
     * @return String
     */
    public function getImg() {
        return 'unknown.jpg';
    }

    /**
     * Return the kind of erreur, will be use in the alt of <img>
     * @return String
     */
    public function getAlt() {
        return 'erreur inconnu';
    }
}

