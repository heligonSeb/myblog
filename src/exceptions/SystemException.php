<?php


namespace App\exceptions;

class SystemException extends \Exception implements AppException 
{
    /**
     * Return the picture name
     * 
     * @return string
     */
    public function getImg() 
    {
        return 'system.jpg';
    }

    /**
     * Return the kind of erreur, will be use in the alt of <img>
     * 
     * @return string
     */
    public function getAlt() 
    {
        return 'erreur système';
    }
}
