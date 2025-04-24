<?php
<<<<<<< HEAD
=======
$config = require_once './config.php';
require_once './App/Model/OrderModel.php';
>>>>>>> fd7a8f8 (second upload)
class UserController
{
    public function index()
    {
        include __DIR__ . '/../Views/User/index.php';
    }
    public function register()
    {
<<<<<<< HEAD
       include './App/Views/User/register.php';
    }

=======
        if (session_status() === PHP_SESSION_NONE)
        {
            session_start();
        }

        $error = '';
        $config = require './config.php';
        $baseURL = $config['baseURL'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $userModel = new UserModel();
            // goi usermodel vao de import vao he thong
            $userId = $userModel->createUser($fullname, $username, $password);
            $_SESSION['user_id'] = $userId;
            $_SESSION['username'] = $username;
            header("Location: " . $baseURL. 'home/index');
            exit;
        }
        include './App/Views/User/register.php';
    }
    public function login()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $pdo = new PDO("mysql:host=localhost;dbname=productdb", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header("Location: " . $GLOBALS['config']['baseURL']); // về trang chủ
                exit;
            } else {
                $error = "Tên đăng nhập hoặc mật khẩu không đúng.";
            }
        }

        include './App/Views/User/login.php';
    }
>>>>>>> fd7a8f8 (second upload)
}
