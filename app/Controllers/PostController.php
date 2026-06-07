<?php

require_once __DIR__ . '/../Models/Post.php';
require_once __DIR__ . '/../Models/Comment.php';
require_once __DIR__ . '/../Models/Category.php';
require_once __DIR__ . '/../Middleware/AuthMiddleware.php';

class PostController
{
    public function index()
    {
        $postModel = new Post();

        if (
            isset($_GET['search']) &&
            !empty(trim($_GET['search']))
        ) {

            $posts = $postModel->search(
                trim($_GET['search'])
            );

        } else {

            $page =
            isset($_GET['page'])
            ? (int)$_GET['page']
            : 1;

            $perPage = 10;

            $offset =
            ($page - 1)
            * $perPage;

            $posts =
            $postModel->getPaginated(
                $perPage,
                $offset
            );

            $totalPosts =
            $postModel->count();

            $totalPages =
            ceil(
                $totalPosts
                / $perPage
            );
        }

        require_once
        __DIR__ .
        '/../Views/posts/index.php';
    }

    public function show()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            die('Post ID required');
        }

        $postModel = new Post();

        $post = $postModel->getById($id);

        if (!$post) {
            die('Post not found');
        }

        $commentModel = new Comment();

        $comments = $commentModel->getByPostId($id);

        require_once
        __DIR__ .
        '/../Views/posts/show.php';
    }

    public function create()
    {
        AuthMiddleware::requireLogin();

        $categoryModel = new Category();

        $categories = $categoryModel->getAll();

        require_once
        __DIR__ .
        '/../Views/posts/create.php';
    }

    public function store()
    {
        AuthMiddleware::requireLogin();

        $title = trim($_POST['title']);
        $slug = trim($_POST['slug']);
        $content = trim($_POST['content']);
        $categoryId = $_POST['category_id'];
        $status = $_POST['status'];

        if (
            empty($title) ||
            empty($slug) ||
            empty($content)
        ) {

            $_SESSION['error'] =
                'All fields are required.';

            header(
                'Location: /mvc-blog-system/public/posts/create'
            );

            exit;
        }

        if (strlen($title) < 3) {

            $_SESSION['error'] =
                'Title must be at least 3 characters.';

            header(
                'Location: /mvc-blog-system/public/posts/create'
            );

            exit;
        }

        if (strlen($content) < 20) {

            $_SESSION['error'] =
                'Content must be at least 20 characters.';

            header(
                'Location: /mvc-blog-system/public/posts/create'
            );

            exit;
        }

        $postModel = new Post();

        $postModel->create(
            $title,
            $slug,
            $content,
            $_SESSION['user_id'],
            $categoryId,
            $status
        );

        $_SESSION['success'] =
            'Post created successfully!';

        header(
            'Location: /mvc-blog-system/public/'
        );

        exit;
    }

    public function edit()
    {
        AuthMiddleware::requireLogin();

        $id = $_GET['id'] ?? null;

        $postModel = new Post();

        $post = $postModel->getById($id);

        require_once
        __DIR__ .
        '/../Views/posts/edit.php';
    }

    public function update()
    {
        AuthMiddleware::requireLogin();

        $id = $_POST['id'];

        $title = trim($_POST['title']);
        $slug = trim($_POST['slug']);
        $content = trim($_POST['content']);

        $postModel = new Post();

        $postModel->update(
            $id,
            $title,
            $slug,
            $content
        );

        $_SESSION['success'] =
            'Post updated successfully!';

        header(
            'Location: /mvc-blog-system/public/'
        );

        exit;
    }

    public function delete()
    {
        AuthMiddleware::requireLogin();

        if (
            !isset($_POST['csrf_token']) ||
            $_POST['csrf_token']
            !== $_SESSION['csrf_token']
        ) {

            die('Invalid CSRF Token');
        }

        $id = $_POST['id'];

        $postModel = new Post();

        $postModel->delete($id);

        $_SESSION['success'] =
            'Post deleted successfully!';

        header(
            'Location: /mvc-blog-system/public/'
        );

        exit;
    }
}
