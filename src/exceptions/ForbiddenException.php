<?php

namespace App\exceptions;

class ForbiddenException extends \Exception implements AppException
{
    /**
     * Return the picture name.
     *
     * @return string
     */
    public function getImg()
    {
        return '403.jpg';
    }

    /**
     * Return the kind of erreur, will be use in the alt of <img>.
     *
     * @return string
     */
    public function getAlt()
    {
        return 'page non authorisée';
    }
}
