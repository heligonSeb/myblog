<?php


namespace App\models\entities;

class Users
{
    public $id;
    public $lastname;
    public $firstname;
    public $email;
    private $password;
    public $validate;
    public $status;

    /**
     * Creat a fullName with the lastname and firstname
     */
    public function fullName() {
        return ucfirst($this->lastname) .' '. ucfirst($this->firstname);
    }

    /**
     * Check if the password is good
     * 
     * @param {String}  $password       the passeword to check
     * 
     * @return {Boolean}    -true if the passeword it's good
     *                      -false if the password is wrong
     */
    public function checkPassword($password) {
        return password_verify($password, $this->password);
    }
}
