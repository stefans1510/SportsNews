<?php
require_once 'Crud.php';
require_once 'Server.php';

class User implements Crud
{
    private $db;
    private $conn;

    public function __construct()
    {
        $this->db = new Server;
        $this->conn = $this->db->connect();
    }

    public function create($data)
    {
        $sql = "INSERT INTO users (username, email, password, user_type) VALUES (:username, :email, :password, :user_type)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":username", $data['username']);
        $stmt->bindValue(":email", $data['email']);
        $stmt->bindValue(":password", $data['password']);
        $stmt->bindValue(":user_type", $data['user_type']);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function read($username=null)
    {
        if ($username) {
            $sql = "SELECT * FROM users WHERE username = :username";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(":username", $username);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $sql = "SELECT * FROM users";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }

    public function update($data, $id)
    {
        $update_fields = "";

        foreach ($data as $key => $value) {
            $update_fields .= "$key = :$key, ";
        }

        $update_fields = rtrim($update_fields, ", ");
        $sql = "UPDATE users SET $update_fields WHERE id = :id";
        $stmt = $this->conn->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->bindValue(":id", $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id", $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}