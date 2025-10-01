<?php
require_once './models/OrderModel.php';
require_once './models/ProductModel.php';
require_once './models/UserModel.php';
class OrderController
{
    public function index()
    {
        $model = new OrderModel();
        $orders = $model->getAllOrders();
        include 'views/order/index.php';
    }
    public function create()
    {
        $userModel = new UserModel();
        $productModel = new ProductModel();
        $users = $userModel->getAllUsers();
        $products = $productModel->getAllProducts();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_user = $_POST['id_user'] ?? null;
            $id_product = $_POST['id_product'] ?? null;
            $quantity = $_POST['quantity'] ?? null;

            $orderModel = new OrderModel();
            $orderModel->create($id_user, $id_product, $quantity);

            header("Location: index.php?controller=order&action=index");
            exit;
        }

        include 'views/order/create.php';
    }
    public function edit()
    {
        $orderModel = new OrderModel();
        $userModel = new UserModel();
        $productModel = new ProductModel();

        $id = $_GET['id'] ?? null;
        if (!$id) {
            $error = "Không có ID đơn hàng để sửa.";
            include 'views/order/edit.php';
            return;
        }

        $order = $orderModel->getById($id);

        if (!$order) {
            $error = "Không tìm thấy đơn hàng với ID: $id";
            include 'views/order/edit.php';
            return;
        }

        $users = $userModel->getAllUsers();
        $products = $productModel->getAllProducts();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_user = $_POST['id_user'] ?? '';
            $id_product = $_POST['id_product'] ?? '';
            $quantity = $_POST['quantity'] ?? '';

            if (empty($id_user) || empty($id_product) || empty($quantity)) {
                $error = "Vui lòng nhập đầy đủ thông tin.";
            } else {
                $updated = $orderModel->update($id, $id_user, $id_product, $quantity);
                if ($updated) {
                    $success = "Cập nhật đơn hàng thành công!";
                    $order = $orderModel->getById($id);
                } else {
                    $error = "Cập nhật thất bại.";
                }
            }
        }

        include 'views/order/edit.php';
    }



    public function delete()
    {
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

        if ($id <= 0) {
            header("Location: index.php?controller=order&action=index&error=invalid");
            exit;
        }

        $model = new ProductModel();
        $result = $model->delete($id);

        if ($result) {

            header("Location: index.php?controller=order&action=index&message=deleted");
        } else {
            header("Location: index.php?controller=order&action=index&error=failed");
        }

        exit;
    }
}
?>