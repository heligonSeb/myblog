<?php


namespace App\models\repositories;

use App\services\database\Database;
use App\models\entities\Users;

class UsersRepository 
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connexionDb();
    }

    /**
     * Get all informations of an user from database with an id
     * 
     * @param String $id
     *      Id of an user
     * 
     * @return Users
     */
    public function getUser($id) 
    {
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
     * @param string $email
     *      Email of an user
     * 
     * @return Users
     */
    public function getUserByEmail($email) 
    {
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
     * @param string $lastname
     *      Lastname of the user
     * @param string $firstname
     *      Firstname of the user
     * @param string $email
     *      Email of the user
     * @param string $password
     *      Password for the user
     */
    public function add($lastname, $firstname, $email, $password) 
    {
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
     * 
     * @param string $email
     *      Email of the user
     */
    public function userExist($email) 
    {
        $user = $this->getUserByEmail($email);

        if(!$user) {
            return true;
        }

        return false;
    }
}
