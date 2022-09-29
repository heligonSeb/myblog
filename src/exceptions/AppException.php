<?php

namespace App\exceptions;

interface AppException
{
    /**
     * Return the picture name.
     *
     * @return string
     */
    public function getImg();

    /**
     * Return the kind of erreur, will be use in the alt of <img>.
     *
     * @return string
     */
    public function getAlt();
}
