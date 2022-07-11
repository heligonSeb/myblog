<?php


namespace App\models\entities;

class Users
{
    public $id;
    public $lastname;
    public $firstname;
    public $email;
    public $password;
    public $validate;
    public $status;

    public function fullName() {
        return ucfirst($this->lastname) .' '. ucfirst($this->firstname);
    }
}