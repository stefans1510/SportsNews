<?php
require_once 'classes/User.php';

class UserController
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register()
    {
        if(isset($_POST['register'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $confirmPassword = password_hash($_POST['confirm_password'], PASSWORD_DEFAULT);
            $user_type = 2;

            $data = [
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'user_type' => $user_type
            ];

            if($this->user->create($data)) {
                header('Location: login.php');
            } else {
                echo "Registration failed";
            }
        }
    }

    public function login()
    {
        if(isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = new User();
            $userData = $user->read($username);

            if($userData && password_verify($password, $userData['password'])) {
                $_SESSION['user_id'] = $userData['id'];
                $_SESSION['user_role'] = $userData['role'];
                switch($userData['role']) {
                    case 0:
                        header('Location: admin.php');
                        break;
                    case 1:
                        header('Location: author.php');
                        break;
                    case 2:
                        header('Location: user.php');
                        break;
                    default:
                        header('Location: index.php');
                        break;
                }
            } else {
                echo "Invalid username or password";
            }
        }
    }
}