<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
</head>
<body>

    <h1>Edit Category</h1>

    <form method="POST" action="/mvc-blog-system/public/categories/update">

        <input
            type="hidden"
            name="id"
            value="<?= $category['id'] ?>"
        >

        <input
            type="text"
            name="name"
            value="<?= htmlspecialchars($category['name']) ?>"
            required
        >

        <br><br>

        <input
            type="text"
            name="slug"
            value="<?= htmlspecialchars($category['slug']) ?>"
            required
        >

        <br><br>

        <button type="submit">
            Update Category
        </button>

    </form>

</body>
</html>