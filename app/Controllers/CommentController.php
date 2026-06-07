<?php

require_once __DIR__ . '/../Models/Comment.php';

class CommentController
{
    public function store()
    {
        $postId = $_POST['post_id'];

        $content = trim(
            $_POST['content']
        );

        $userId = 1;

        $commentModel = new Comment();

        $commentModel->create(
            $postId,
            $userId,
            $content
        );

        header(
            'Location: /mvc-blog-system/public/posts/show?id='
            . $postId
        );

        exit;
    }

    public function delete()
    {
        $id = $_POST['id'];

        $postId = $_POST['post_id'];

        $commentModel = new Comment();

        $commentModel->delete($id);

        header(
            'Location: /mvc-blog-system/public/posts/show?id='
            . $postId
        );

        exit;
    }
}