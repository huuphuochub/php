<?php
require_once '../app/models/UserModel.php';

class LoginController
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $userModel = new UserModel($this->db);
            $user = $userModel->getUserByUsername($username);
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = ['id' => $user['id'],'name' => $user['name'], 'email' => $user['email'], 
                        'role' => $user['role'] ];
                if ($_SESSION['user']['role'] == 0){
                    header('Location: admin/index.php');
                }else{
                    header('Location: index.php');
                }
                exit;
            } else {
            }
            
        }
        include '../app/views/login.php';
    }

}

class RegisterController
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;

    }
    public function register()
    {
        // $errorMessage = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['username']; // Sử dụng username
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];
            $confirmPassword = $_POST['confirmPassword'];

            if ($password !== $confirmPassword) {
                // $errorMessage = 'Mật khẩu và xác nhận mật khẩu không khớp';
            } else {
                $userModel = new UserModel($this->db);
                $userByEmail = $userModel->getUserByEmail($email);
                $userByUsername = $userModel->getUserByUsername($name);

                if ($userByEmail) {
                    // $errorMessage = 'Email đã được sử dụng';
                } elseif ($userByUsername) {
                    // $errorMessage = 'Tên người dùng đã được sử dụng';
                } else {
                    $userModel->createUser($name, $email, $password, $role);
                    header('Location: index.php?page=login');
                    exit;
                }
            }
        }

        include '../app/views/register.php'; // Truyền $errorMessage đến view nếu cần
    }

}


?>