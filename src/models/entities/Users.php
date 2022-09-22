<?php

namespace App\models\entities;

class Users
{
    public $id;
    public $lastname;
    public $firstname;
    public $email;
    private $password;
    public $status;

    /**
     * Creat a fullName with the lastname and firstname.
     *
     * @return string
     */
    public function fullName()
    {
        return ucfirst($this->lastname).' '.ucfirst($this->firstname);
    }

    /**
     * Check if the password is good.
     *
     * @param string $password
     *                         Password to check
     *
     * @return bool
     *              True if the passeword it's good,
     *              False if the password is wrong
     */
    public function checkPassword($password)
    {
        return password_verify($password, $this->password);
    }
}
