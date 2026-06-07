<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h1 class="mb-4">
    Create Post
</h1>

<form
    method="POST"
    action="/mvc-blog-system/public/posts/create"
>

    <div class="mb-3">

        <label class="form-label">
            Title
        </label>

        <input
            type="text"
            name="title"
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

    <div class="mb-3">

        <label class="form-label">
            Category
        </label>

        <select
            name="category_id"
            class="form-select"
            required
        >

            <option value="">
                Select Category
            </option>

            <?php foreach($categories as $category): ?>

                <option
                    value="<?= $category['id'] ?>"
                >
                    <?= htmlspecialchars($category['name']) ?>
                </option>

            <?php endforeach; ?>

        </select>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Status
        </label>

        <select
            name="status"
            class="form-select"
            required
        >

            <option value="draft">
                Draft
            </option>

            <option value="published">
                Published
            </option>

        </select>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Content
        </label>

        <textarea
            name="content"
            class="form-control"
            rows="8"
            required
        ></textarea>

    </div>

    <button
        type="submit"
        class="btn btn-primary"
    >
        Create Post
    </button>

</form>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>