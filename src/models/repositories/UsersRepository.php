<?php


namespace App\models\repositories;

use App\services\database\Database;
use App\models\entities\User;
use App\models\entities\Users;

class UsersRepository 
{
    private $db;
    private $table="users";

    public function __construct()
    {
        $this->db = Database::connexionDb();
    }

    public function getUser($id) {
        $query = 'SELECT * FROM '.$this->table.' WHERE id=:id';

        $q = $this->db->prepare($query);
        $q->execute(['id' => $id]);
        $q->setFetchMode(\PDO::FETCH_CLASS, Users::class);

        $result = $q->fetch();
        
        return $result;
    }

    public function getUserByEmail($email) {
        $query = 'SELECT * FROM '.$this->table.' WHERE email=:email';

        $q = $this->db->prepare($query);
        $q->execute(['email' => $email]);
        $q->setFetchMode(\PDO::FETCH_CLASS, Users::class);

        $result = $q->fetch();

        return $result;
    }

    public function add($lastname, $firstname, $email, $password) {
        $query = 'INSERT INTO '.$this->table.' (lastname,firstname,email,password,validate,status) VALUES (:lastname,:firstname,:email,:password,0,"user")';

        $q = $this->db->prepare($query);
        $q->execute([
                'lastname' => $lastname,
                'firstname' => $firstname,
                'email' => $email,
                'password' => $password
        ]);
    }

    public function userExist($email) {
        $user = $this->getUserByEmail($email);

        if(!$user) {
            return true;
        }

        return false;
    }
}