<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="row justify-content-center">

    <div class="col-md-6 col-lg-4">

        <div class="card shadow mt-5">

            <div class="card-body p-4">

                <h2 class="text-center mb-4">
                    Login
                </h2>

                <form
                    method="POST"
                    action="/mvc-blog-system/public/login"
                >

                    <div class="mb-3">

                        <label class="form-label">
                            Email Address
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            placeholder="Enter your email"
                            required
                        >

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Enter your password"
                            required
                        >

                    </div>

                    <div class="d-grid">

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            Login
                        </button>

                    </div>

                </form>

                <hr>

                <p class="text-center mb-0">

                    Don't have an account?

                    <a
                        href="/mvc-blog-system/public/register"
                    >
                        Register
                    </a>

                </p>

            </div>

        </div>

    </div>

</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>