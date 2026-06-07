<?php

require_once __DIR__ . '/../Middleware/AdminMiddleware.php';

require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Models/Post.php';
require_once __DIR__ . '/../Models/Category.php';
require_once __DIR__ . '/../Models/Comment.php';

class AdminController
{
    public function dashboard()
    {
        AdminMiddleware::requireAdmin();

        $userModel = new User();
        $postModel = new Post();
        $categoryModel = new Category();
        $commentModel = new Comment();

        $totalUsers = $userModel->count();
        $totalPosts = $postModel->count();
        $totalCategories = $categoryModel->count();
        $totalComments = $commentModel->count();

        require_once
        __DIR__ .
        '/../Views/admin/dashboard.php';
    }
}