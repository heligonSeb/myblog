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
}