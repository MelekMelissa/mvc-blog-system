<?php

require_once __DIR__ . '/../Models/User.php';

class AuthController
{
    public function register()
    {
        require_once
        __DIR__ .
        '/../Views/auth/register.php';
    }

    public function registerStore()
    {
        $username = trim($_POST['username']);

        $email = trim($_POST['email']);

        $password = password_hash(
            $_POST['password'],
            PASSWORD_DEFAULT
        );

        $user = new User();

        $user->create(
            $username,
            $email,
            $password
        );

        header(
            'Location: /mvc-blog-system/public/login'
        );

        exit;
    }

    public function login()
    {
        require_once
        __DIR__ .
        '/../Views/auth/login.php';
    }

    public function loginStore()
    {
        $email = trim($_POST['email']);

        $password = $_POST['password'];

        $user = new User();

        $existingUser =
        $user->findByEmail($email);

        if (
            !$existingUser ||
            !password_verify(
                $password,
                $existingUser['password']
            )
        ) {
            echo "Invalid credentials";
            return;
        }

        $_SESSION['user_id'] =
        $existingUser['id'];

        $_SESSION['username'] =
        $existingUser['username'];

        $_SESSION['role'] =
        $existingUser['role'];

        header(
            'Location: /mvc-blog-system/public/'
        );

        exit;
    }

    public function profile()
    {
        if (!isset($_SESSION['user_id'])) {

            header(
                'Location: /mvc-blog-system/public/login'
            );

            exit;
        }

        $userModel = new User();

        $user = $userModel->findById(
            $_SESSION['user_id']
        );

        require_once
        __DIR__ .
        '/../Views/auth/profile.php';
    }

    public function changePassword()
    {
        if (!isset($_SESSION['user_id'])) {

            header(
                'Location: /mvc-blog-system/public/login'
            );

            exit;
        }

        $userModel = new User();

        $user = $userModel->findById(
            $_SESSION['user_id']
        );

        if (
            !password_verify(
                $_POST['current_password'],
                $user['password']
            )
        ) {

            $_SESSION['error'] =
            'Current password is incorrect.';

            header(
                'Location: /mvc-blog-system/public/profile'
            );

            exit;
        }

        $newPassword = password_hash(
            $_POST['new_password'],
            PASSWORD_DEFAULT
        );

        $userModel->updatePassword(
            $_SESSION['user_id'],
            $newPassword
        );

        $_SESSION['success'] =
        'Password updated successfully!';

        header(
            'Location: /mvc-blog-system/public/profile'
        );

        exit;
    }

    public function logout()
    {
        session_unset();

        session_destroy();

        header(
            'Location: /mvc-blog-system/public/'
        );

        exit;
    }
}