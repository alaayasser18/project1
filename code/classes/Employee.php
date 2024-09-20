<?php
class Employee {
    private $conn;
    private $table_name = "employees";

    public $id;
    public $name;
    public $email;
    public $phone;
    public $picture;
    public $manager_id;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET name=:name, email=:email, phone=:phone, picture=:picture, manager_id=:manager_id";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':picture', $this->picture);
        $stmt->bindParam(':manager_id', $this->manager_id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function readAll() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE manager_id = :manager_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':manager_id', $this->manager_id);
        $stmt->execute();

        return $stmt;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET name=:name, email=:email, phone=:phone, picture=:picture WHERE id = :id AND manager_id = :manager_id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':picture', $this->picture);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':manager_id', $this->manager_id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id AND manager_id = :manager_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':manager_id', $this->manager_id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>