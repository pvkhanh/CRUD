<?php
require_once 'config/database.php';
class OrderModel
{
    private $conn;
    public function __construct()
    {
        $this->conn = (new DB())->connect();
    }
    public function getAllOrders()
    {
        $sql = "SELECT 
                o.id_order,
                o.quantity,
                u.name AS user_name,
                p.product_name,
                p.price,
                (p.price * o.quantity) AS total_amount
            FROM `order` o
            JOIN `user` u ON o.id_user = u.id_user
            JOIN `product` p ON o.id_product = p.id_product";

        $result = mysqli_query($this->conn, $sql);
        $orders = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $orders[] = $row;
        }
        return $orders;
    }

    public function getById($id)
    {
        $id = (int) $id;
        $query = "SELECT * FROM `order` WHERE id_order = $id";
        $result = mysqli_query($this->conn, $query);
        return mysqli_fetch_assoc($result);
    }

    public function create($id_user, $id_product, $quantity)
    {
        $sql = "INSERT INTO `order` (`id_user`, `id_product`, `quantity`) 
        VALUES ('$id_user', '$id_product', '$quantity')";
        return mysqli_query($this->conn, $sql);

    }
    public function update($id, $id_user, $id_product, $quantity)
    {
        $sql = "UPDATE `order` 
            SET id_user = '$id_user', 
                id_product = '$id_product', 
                quantity = '$quantity' 
            WHERE id_order = $id";

        return mysqli_query($this->conn, $sql);
    }

    public function delete($id_order)
    {
        $sql = "DELETE FROM `order` WHERE `id_order`=$id_order";
        return mysqli_query($this->conn, $sql);
    }
}


?>