<?php
include 'views/layout/header.php';

$controller = $_GET['controller'] ?? null;
$action = $_GET['action'] ?? null;

if ($controller && $action) {
    $controllerName = ucfirst($controller) . 'Controller';
    $controllerFile = "controllers/$controllerName.php";

    if (file_exists($controllerFile)) {
        require_once $controllerFile;

        if (class_exists($controllerName)) {
            $controllerObject = new $controllerName();

            if (method_exists($controllerObject, $action)) {
                $controllerObject->$action();
            } else {
                echo "<div class='alert alert-danger'>Không tìm thấy action '$action'</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Không tìm thấy class '$controllerName'</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Không tìm thấy file controller '$controllerFile'</div>";
    }
} else {

    echo "<h2 class='text-center'></h2>";
}


include 'views/layout/footer.php';
?>