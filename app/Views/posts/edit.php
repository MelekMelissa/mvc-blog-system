<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
</head>
<body>

    <h1>Edit Post</h1>

    <form method="POST" action="/mvc-blog-system/public/posts/update">

        <input
            type="hidden"
            name="id"
            value="<?= $post['id'] ?>"
        >

        <input
            type="text"
            name="title"
            value="<?= htmlspecialchars($post['title']) ?>"
            required
        >

        <br><br>

        <input
            type="text"
            name="slug"
            value="<?= htmlspecialchars($post['slug']) ?>"
            required
        >

        <br><br>

        <textarea
            name="content"
            rows="10"
            cols="50"
            required
        ><?= htmlspecialchars($post['content']) ?></textarea>

        <br><br>

        <button type="submit">
            Update Post
        </button>

    </form>

</body>
</html>