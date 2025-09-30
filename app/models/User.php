<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{
    public function getUserData()
    {
        return [
            "nome" => "Raphael David Leforte",
            "idade" => 27,
            "email" => "teste@teste.com"
        ];
    }

    public function createUser($name)
    {
        $sql = "INSERT INTO user (name) VALUES (:name)";
        $params = [
            ':name' => $name,
        ];
        return $this->db->execute($sql, $params);
    }

    public function getAllUsers()
    {
        $sql = "SELECT * FROM user";
        return $this->db->fetchAll($sql);
    }

    public function getUserById($id)
    {
        $sql = "SELECT * FROM user WHERE idUser = :id";
        $params = [
            ':id' => $id,
        ];
        return $this->db->fetch($sql, $params);
    }

    public function getUsersCount()
    {
        $sql = "SELECT COUNT(*) as count FROM user";
        $result = $this->db->fetch($sql);
        return $result ? $result->count : 0;
    }

    public function getUsersByName($name)
    {
        $sql = "SELECT * FROM user WHERE name LIKE :name";
        $params = [
            ':name' => "%" . $name . "%",
        ];
        return $this->db->fetchAll($sql, $params);
    }

    public function deleteUser($id)
    {
        $sql = "DELETE FROM user WHERE idUser = :id";
        $params = [
            ':id' => $id,
        ];
        return $this->db->execute($sql, $params);
    }

    public function updateUser($id, $name)
    {
        $sql = "UPDATE user SET name = :name WHERE idUser = :id";
        $params = [
            ':name' => $name,
            ':id'   => $id,
        ];
        return $this->db->execute($sql, $params);
    }

}