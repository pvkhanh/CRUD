<?php
require_once 'config/database.php';
class UserModel
{
    private $conn;
    public function __construct()
    {
        $this->conn = (new DB())->connect();
    }
    public function getAllUsers()
    {
        $result = mysqli_query($this->conn, "SELECT * FROM user");
        $users = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
        return $users;
    }
    public function getById($id)
    {
        $id = (int) $id; 
        $query = "SELECT * FROM user WHERE id_user = $id";
        $result = mysqli_query($this->conn, $query);
        return mysqli_fetch_assoc($result);
    }

    public function create($name, $email)
    {
        $sql = "INSERT INTO user (name, email) VALUES ('$name', '$email')";
        return mysqli_query($this->conn, $sql);

    }
    public function update($id, $name, $email)
    {
        $sql = "UPDATE user SET name='$name', email='$email' WHERE id_user=$id";
        return mysqli_query($this->conn, $sql);
    }
    public function delete($id)
    {
        $sql = "DELETE FROM user WHERE id_user=$id";
        return mysqli_query($this->conn, $sql);
    }
}


?>