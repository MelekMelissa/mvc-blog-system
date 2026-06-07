<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h1 class="mb-4">
    Create Category
</h1>

<form
    method="POST"
    action="/mvc-blog-system/public/categories/create"
>

    <div class="mb-3">

        <label class="form-label">
            Category Name
        </label>

        <input
            type="text"
            name="name"
            class="form-control"
            required
        >

    </div>

    <div class="mb-3">

        <label class="form-label">
            Slug
        </label>

        <input
            type="text"
            name="slug"
            class="form-control"
            required
        >

    </div>

    <button
        type="submit"
        class="btn btn-primary"
    >
        Create Category
    </button>

</form>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>