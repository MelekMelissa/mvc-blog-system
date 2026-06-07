<?php

class AdminMiddleware
{
    public static function requireAdmin()
    {
        if (
            !isset($_SESSION['role']) ||
            $_SESSION['role'] !== 'admin'
        ) {

            die(
                'Access denied. Admin only.'
            );
        }
    }
}