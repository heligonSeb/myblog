<?php


namespace App\models\repositories;

use App\services\database\Database;
use App\models\entities\Users;

class UsersRepository 
{
    private $db;
    const TABLE="users";

    public function __construct()
    {
        $this->db = Database::connexionDb();
    }

    /**
     * Get all informations of an user from database with an id
     * 
     * @param {String} $id     the id of an user
     * 
     * @return {Object}
     */
    public function getUser($id) {
        $query = 'SELECT * FROM users WHERE id=:id';

        $q = $this->db->prepare($query);
        $q->execute(['id' => $id]);
        $q->setFetchMode(\PDO::FETCH_CLASS, Users::class);

        $result = $q->fetch();
        
        return $result;
    }

    /**
     * Get all informations of an user from database with an email
     * 
     * @param {String} $email     the email of an user
     * 
     * @return {Object}
     */
    public function getUserByEmail($email) {
        $query = 'SELECT * FROM users WHERE email=:email';

        $q = $this->db->prepare($query);
        $q->execute(['email' => $email]);
        $q->setFetchMode(\PDO::FETCH_CLASS, Users::class);

        $result = $q->fetch();

        return $result;
    }

    /**
     * Insert a new user in database
     * 
     * @param {String} $lastname        lastname of the user
     * @param {String} $firstname       firstname of the user
     * @param {String} $email           email of the user
     * @param {String} $password        password for the user
     */
    public function add($lastname, $firstname, $email, $password) {
        $query = 'INSERT INTO users (lastname,firstname,email,password,validate,status) VALUES (:lastname,:firstname,:email,:password,0,"user")';

        $q = $this->db->prepare($query);
        $q->execute([
            'lastname' => $lastname,
            'firstname' => $firstname,
            'email' => $email,
            'password' => $password
        ]);
    }

    /**
     * Check if the user exist in database
     * @param {String} $email       Email of the user
     */
    public function userExist($email) {
        $user = $this->getUserByEmail($email);

        if(!$user) {
            return true;
        }

        return false;
    }
}
