<?php

require_once __DIR__ . '/../Models/Category.php';
require_once __DIR__ . '/../Middleware/AuthMiddleware.php';
require_once __DIR__ . '/../Middleware/AdminMiddleware.php';

class CategoryController
{
    public function index()
    {
        $categoryModel = new Category();

        $categories = $categoryModel->getAll();

        require_once
        __DIR__ .
        '/../Views/categories/index.php';
    }

    public function create()
    {
        AuthMiddleware::requireLogin();

        require_once
        __DIR__ .
        '/../Views/categories/create.php';
    }

    public function store()
    {
        AuthMiddleware::requireLogin();

        $name = trim($_POST['name']);

        $slug = trim($_POST['slug']);

        $categoryModel = new Category();

        $categoryModel->create(
            $name,
            $slug
        );

        header(
            'Location: /mvc-blog-system/public/categories'
        );

        exit;
    }

    public function edit()
    {
        AdminMiddleware::requireAdmin();

        $id = $_GET['id'] ?? null;

        $categoryModel = new Category();

        $category = $categoryModel->getById($id);

        require_once
        __DIR__ .
        '/../Views/categories/edit.php';
    }

    public function update()
    {
        AdminMiddleware::requireAdmin();

        $id = $_POST['id'];

        $name = trim($_POST['name']);

        $slug = trim($_POST['slug']);

        $categoryModel = new Category();

        $categoryModel->update(
            $id,
            $name,
            $slug
        );

        header(
            'Location: /mvc-blog-system/public/categories'
        );

        exit;
    }

    public function delete()
    {
        AdminMiddleware::requireAdmin();

        $id = $_POST['id'];

        $categoryModel = new Category();

        $categoryModel->delete($id);

        header(
            'Location: /mvc-blog-system/public/categories'
        );

        exit;
    }
}