<?php
require_once './models/UserModel.php';
class UserController
{
    public function index()
    {
        $model = new UserModel();
        $users = $model->getAllUsers();
        include 'views/user/index.php';
    }
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';

            $model = new UserModel();
            $model->create($name, $email);

            header("Location: index.php?controller=user&action=index");
            exit;
        }

        include 'views/user/create.php';
    }

    public function edit()
    {
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

        $model = new UserModel();
        $user = $model->getById($id);
        $error = null;
        $success = null;

        if (!$user) {
            $error = "Không tìm thấy người dùng có ID = $id.";
            include 'views/user/edit.php';
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';

            if (empty($name) || empty($email)) {
                $error = "Vui lòng nhập đầy đủ thông tin.";
            } else {
                $result = $model->update($id, $name, $email);
                if ($result) {
                    $user = $model->getById($id);
                    $success = "Cập nhật thành công.";

                } else {
                    $error = "Lỗi khi cập nhật dữ liệu. Vui lòng thử lại.";
                }
            }
        }

        include 'views/user/edit.php';
    }



    public function delete()
    {
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

        if ($id <= 0) {
            header("Location: index.php?controller=user&action=index&error=invalid");
            exit;
        }

        $model = new UserModel();
        $result = $model->delete($id);

        if ($result) {

            header("Location: index.php?controller=user&action=index&message=deleted");
        } else {
            header("Location: index.php?controller=user&action=index&error=failed");
        }

        exit;
    }
}
?>