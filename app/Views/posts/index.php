<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="p-5 mb-5 bg-light rounded-3 shadow-sm">

    <div class="container-fluid py-3">

        <h1 class="display-4 fw-bold">
            MVC Blog System
        </h1>

        <p class="lead">
            Share ideas, tutorials and articles with the community.
        </p>

        <form
            method="GET"
            action="/mvc-blog-system/public/"
            class="mt-4 mb-3"
        >

            <div class="input-group">

                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Search posts..."
                    value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"
                >

                <button
                    type="submit"
                    class="btn btn-dark"
                >
                    Search
                </button>

            </div>

        </form>

        <?php if(isset($_SESSION['user_id'])): ?>

            <a
                href="/mvc-blog-system/public/posts/create"
                class="btn btn-primary btn-lg"
            >
                Create New Post
            </a>

        <?php endif; ?>

    </div>

</div>

<div class="row text-center mb-4">

    <div class="col-md-4">

        <div class="card border-primary shadow-sm">

            <div class="card-body">

                <h2>
                    <?= count($posts) ?>
                </h2>

                <p class="mb-0">
                    Total Posts
                </p>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card border-success shadow-sm">

            <div class="card-body">

                <h2>
                    <?= isset($_SESSION['username']) ? '1' : '0' ?>
                </h2>

                <p class="mb-0">
                    Active Users
                </p>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card border-warning shadow-sm">

            <div class="card-body">

                <h2>
                    <?= count($posts) ?>
                </h2>

                <p class="mb-0">
                    Articles
                </p>

            </div>

        </div>

    </div>

</div>

<?php if(empty($posts)): ?>

    <div class="alert alert-info">
        No posts found.
    </div>

<?php else: ?>

    <div class="row">

        <?php foreach($posts as $post): ?>

            <div class="col-lg-6 mb-4">

                <div class="card h-100 shadow-sm">

                    <div class="card-body">

                        <?php if(!empty($post['category_name'])): ?>

                            <span class="badge bg-primary mb-2">
                                <?= htmlspecialchars($post['category_name']) ?>
                            </span>

                        <?php endif; ?>

                        <h3 class="card-title">

                            <a
                                href="/mvc-blog-system/public/posts/show?id=<?= $post['id'] ?>"
                                class="text-decoration-none text-dark"
                            >
                                <?= htmlspecialchars($post['title']) ?>
                            </a>

                        </h3>

                        <p class="text-muted small">
                            Published Article
                        </p>

                        <p class="card-text">

                            <?= htmlspecialchars(
                                substr(
                                    $post['content'],
                                    0,
                                    150
                                )
                            ) ?>

                            ...

                        </p>

                    </div>

                    <div class="card-footer bg-white border-0">

                        <a
                            href="/mvc-blog-system/public/posts/show?id=<?= $post['id'] ?>"
                            class="btn btn-outline-primary btn-sm"
                        >
                            Read More
                        </a>

                        <?php if(
                            isset($_SESSION['user_id']) &&
                            (
                                $_SESSION['user_id'] == $post['user_id']
                                ||
                                ($_SESSION['role'] ?? '') === 'admin'
                            )
                        ): ?>

                            <a
                                href="/mvc-blog-system/public/posts/edit?id=<?= $post['id'] ?>"
                                class="btn btn-warning btn-sm"
                            >
                                Edit
                            </a>

                            <form
                                method="POST"
                                action="/mvc-blog-system/public/posts/delete"
                                class="d-inline"
                            >

                                <input
                                    type="hidden"
                                    name="id"
                                    value="<?= $post['id'] ?>"
                                >

                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm"
                                >
                                    Delete
                                </button>

                            </form>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

        <?php endforeach; ?>

    </div>
<?php endif; ?>

<?php if(isset($totalPages) && $totalPages > 1): ?>

<nav class="mt-4">

    <ul class="pagination justify-content-center">

        <?php for(
            $i = 1;
            $i <= $totalPages;
            $i++
        ): ?>

            <li
                class="page-item <?= ($i == ($_GET['page'] ?? 1)) ? 'active' : '' ?>"
            >

                <a
                    class="page-link"
                    href="?page=<?= $i ?>"
                >
                    <?= $i ?>
                </a>

            </li>

        <?php endfor; ?>

    </ul>

</nav>

<?php endif; ?>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>


