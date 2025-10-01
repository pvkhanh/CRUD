<?php
require_once 'config/database.php';
class ProductModel
{
    private $conn;
    public function __construct()
    {
        $this->conn = (new DB())->connect();
    }
    public function getAllProducts()
    {
        $result = mysqli_query($this->conn, "SELECT * FROM product");
        $products = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }
        return $products;
    }
    public function getById($id)
    {
        $id = (int) $id;
        $query = "SELECT * FROM product WHERE id_product = $id";
        $result = mysqli_query($this->conn, $query);
        return mysqli_fetch_assoc($result);
    }

    public function create($product_name, $describe, $price)
    {
        $sql = "INSERT INTO product (`product_name`, `describe`, `price`) 
        VALUES ('$product_name', '$describe', '$price')";
        return mysqli_query($this->conn, $sql);

    }
    public function update($id_product, $product_name, $describe, $price)
    {
        $sql = "UPDATE product SET `product_name`='$product_name', `describe`='$describe', `price`='$price' WHERE `id_product`=$id_product";
        return mysqli_query($this->conn, $sql);
    }
    public function delete($id_product)
    {
        $sql = "DELETE FROM product WHERE `id_product`=$id_product";
        return mysqli_query($this->conn, $sql);
    }
}


?>