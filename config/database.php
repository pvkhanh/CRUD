<?php
class DB
{
    function connect()
    {
        $conn = new mysqli("localhost", "root", "", "crud_example");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
}
?>