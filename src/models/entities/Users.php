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

    public function fullName() {
        return ucfirst($this->lastname) .' '. ucfirst($this->firstname);
    }

    /**
     * Check if valide password
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