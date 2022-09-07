<?php

namespace App\exceptions;

class NotFoundException extends \Exception implements AppException {
    /**
     * Return the picture name
     * @return String
     */
    public function getImg() {
        return '404.jpg';
    }

    /**
     * Return the kind of erreur, will be use in the alt of <img>
     * @return String
     */
    public function getAlt() {
        return 'page introuvable';
    }
}

