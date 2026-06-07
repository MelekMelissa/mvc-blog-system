<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card shadow-sm mb-4">

            <div class="card-body">

                <h2 class="mb-4">
                    User Profile
                </h2>

                <table class="table">

                    <tr>
                        <th>User ID</th>
                        <td><?= $user['id'] ?></td>
                    </tr>

                    <tr>
                        <th>Username</th>
                        <td><?= htmlspecialchars($user['username']) ?></td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                    </tr>

                    <tr>
                        <th>Role</th>
                        <td><?= htmlspecialchars($user['role']) ?></td>
                    </tr>

                </table>

            </div>

        </div>

        <div class="card shadow-sm">

            <div class="card-body">

                <h3 class="mb-4">
                    Change Password
                </h3>

                <form
                    method="POST"
                    action="/mvc-blog-system/public/change-password"
                >

                    <div class="mb-3">

                        <label class="form-label">
                            Current Password
                        </label>

                        <input
                            type="password"
                            name="current_password"
                            class="form-control"
                            required
                        >

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            New Password
                        </label>

                        <input
                            type="password"
                            name="new_password"
                            class="form-control"
                            required
                        >

                    </div>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Update Password
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>