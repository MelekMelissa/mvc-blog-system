<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h1 class="mb-4">
    Admin Dashboard
</h1>

<div class="row">

    <div class="col-md-3">

        <div class="card text-center mb-3 border-primary">

            <div class="card-body">

                <h5 class="card-title">
                    Users
                </h5>

                <h1>
                    <?= $totalUsers ?>
                </h1>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card text-center mb-3 border-success">

            <div class="card-body">

                <h5 class="card-title">
                    Posts
                </h5>

                <h1>
                    <?= $totalPosts ?>
                </h1>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card text-center mb-3 border-warning">

            <div class="card-body">

                <h5 class="card-title">
                    Categories
                </h5>

                <h1>
                    <?= $totalCategories ?>
                </h1>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card text-center mb-3 border-danger">

            <div class="card-body">

                <h5 class="card-title">
                    Comments
                </h5>

                <h1>
                    <?= $totalComments ?>
                </h1>

            </div>

        </div>

    </div>

</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>