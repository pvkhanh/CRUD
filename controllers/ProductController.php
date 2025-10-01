<?php
require_once './models/ProductModel.php';
class ProductController
{
    public function index()
    {
        $model = new ProductModel();
        $products = $model->getAllProducts();
        include 'views/product/index.php';
    }
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product_name = $_POST['product_name'] ?? '';
            $describe = $_POST['describe'] ?? '';
            $price = $_POST['price'] ?? '';
            $model = new ProductModel();
            $model->create($product_name, $describe, $price);

            header("Location: index.php?controller=product&action=index");
            exit;
        }

        include 'views/product/create.php';
    }
    public function edit()
    {
        $id_product = isset($_GET['id']) ? (int) $_GET['id'] : 0;

        $model = new ProductModel();
        $product = $model->getById($id_product);
        $error = null;
        $success = null;

        if (!$product) {
            $error = "Không tìm thấy sản phẩm có ID = $id_product.";
            include 'views/product/edit.php';
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product_name = $_POST['product_name'] ?? '';
            $describe = $_POST['describe'] ?? '';
            $price = $_POST['price'] ?? '';

            if (empty($product_name) || empty($describe) || empty($price)) {
                $error = "Vui lòng nhập đầy đủ thông tin.";
            } else {
                $result = $model->update($id_product, $product_name, $describe, $price);
                if ($result) {

                    $product = $model->getById($id_product);
                    $success = "Cập nhật thành công.";

                } else {
                    $error = "Lỗi khi cập nhật dữ liệu. Vui lòng thử lại.";
                }
            }
        }

        include 'views/product/edit.php';
    }



    public function delete()
    {
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

        if ($id <= 0) {
            header("Location: index.php?controller=product&action=index&error=invalid");
            exit;
        }

        $model = new ProductModel();
        $result = $model->delete($id);

        if ($result) {

            header("Location: index.php?controller=product&action=index&message=deleted");
        } else {
            header("Location: index.php?controller=product&action=index&error=failed");
        }

        exit;
    }
}
?>