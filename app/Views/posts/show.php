<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($post['title']) ?></title>
</head>
<body>

    <h1><?= htmlspecialchars($post['title']) ?></h1>

    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>

    <hr>

    <h2>Comments</h2>

    <form
        method="POST"
        action="/mvc-blog-system/public/comments/create"
    >
        <input
            type="hidden"
            name="post_id"
            value="<?= $post['id'] ?>"
        >

        <textarea
            name="content"
            rows="5"
            cols="50"
            placeholder="Write a comment..."
            required
        ></textarea>

        <br><br>

        <button type="submit">
            Add Comment
        </button>
    </form>

    <hr>

    <?php if(empty($comments)): ?>

        <p>No comments yet.</p>

    <?php else: ?>

        <?php foreach($comments as $comment): ?>

            <div>

                <p>
                    <?= htmlspecialchars($comment['content']) ?>
                </p>

                <small>
                    <?= $comment['created_at'] ?>
                </small>

                <form
                    method="POST"
                    action="/mvc-blog-system/public/comments/delete"
                >
                    <input
                        type="hidden"
                        name="id"
                        value="<?= $comment['id'] ?>"
                    >

                    <input
                        type="hidden"
                        name="post_id"
                        value="<?= $post['id'] ?>"
                    >

                    <button type="submit">
                        Delete Comment
                    </button>
                </form>

            </div>

            <hr>

        <?php endforeach; ?>

    <?php endif; ?>

    <a href="/mvc-blog-system/public/">
        Back to Posts
    </a>

</body>
</html>