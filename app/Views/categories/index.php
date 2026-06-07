<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h1 class="mb-4">Categories</h1>

<?php if(isset($_SESSION['user_id'])): ?>

    <div class="mb-4">

        <a
            href="/mvc-blog-system/public/categories/create"
            class="btn btn-primary"
        >
            Create Category
        </a>

    </div>

<?php endif; ?>

<?php if(empty($categories)): ?>

    <div class="alert alert-info">
        No categories found.
    </div>

<?php else: ?>

    <div class="row">

        <?php foreach($categories as $category): ?>

            <div class="col-md-6 mb-4">

                <div class="card">

                    <div class="card-body">

                        <h4 class="card-title">
                            <?= htmlspecialchars($category['name']) ?>
                        </h4>

                        <p class="card-text">
                            <?= htmlspecialchars($category['slug']) ?>
                        </p>

                    </div>

                    <?php if(
                        isset($_SESSION['role']) &&
                        $_SESSION['role'] === 'admin'
                    ): ?>

                        <div class="card-footer">

                            <a
                                href="/mvc-blog-system/public/categories/edit?id=<?= $category['id'] ?>"
                                class="btn btn-warning btn-sm"
                            >
                                Edit
                            </a>

                            <form
                                method="POST"
                                action="/mvc-blog-system/public/categories/delete"
                                class="d-inline"
                            >

                                <input
                                    type="hidden"
                                    name="id"
                                    value="<?= $category['id'] ?>"
                                >

                                <input
                                    type="hidden"
                                    name="csrf_token"
                                    value="<?= $_SESSION['csrf_token'] ?>"
                                >

                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this category?')"
                                >
                                    Delete
                                </button>

                            </form>

                        </div>

                    <?php endif; ?>

                </div>

            </div>

        <?php endforeach; ?>

    </div>

<?php endif; ?>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>