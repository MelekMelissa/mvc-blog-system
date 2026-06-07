<?php

class AuthMiddleware
{
    public static function requireLogin()
    {
        if (!isset($_SESSION['user_id'])) {

            header(
                'Location: /mvc-blog-system/public/login'
            );

            exit;
        }
    }
}