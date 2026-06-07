<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog System</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        body{
            background:#f4f7fb;
            font-family:Segoe UI,Tahoma,Geneva,Verdana,sans-serif;
        }

        .navbar{
            background:linear-gradient(
                135deg,
                #4f46e5,
                #7c3aed
            ) !important;

            box-shadow:
            0 4px 20px rgba(0,0,0,.15);
        }

        .navbar-brand{
            font-weight:700;
            letter-spacing:1px;
            font-size:1.3rem;
        }

        .card{
            border:none;
            border-radius:20px;

            transition:all .3s ease;

            overflow:hidden;
        }

        .card:hover{
            transform:translateY(-8px);

            box-shadow:
            0 20px 40px rgba(0,0,0,.12);
        }

        .btn{
            border-radius:12px;
        }

        .badge{
            font-size:.85rem;
            padding:8px 12px;
        }

        .hero-gradient{
            background:
            linear-gradient(
                135deg,
                #4f46e5,
                #7c3aed,
                #ec4899
            );

            color:white;

            border-radius:25px;

            box-shadow:
            0 15px 40px rgba(124,58,237,.3);
        }

        .stats-card{
            border-radius:20px;

            background:white;

            box-shadow:
            0 10px 30px rgba(0,0,0,.08);
        }

        .stats-number{
            font-size:2rem;
            font-weight:700;
        }

        .card-title a{
            transition:.3s;
        }

        .card-title a:hover{
            color:#7c3aed !important;
        }

    </style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">

        <a
            class="navbar-brand"
            href="/mvc-blog-system/public/"
        >
            🚀 MVC Blog
        </a>

        <div>

            <a
                class="btn btn-outline-light me-2"
                href="/mvc-blog-system/public/categories"
            >
                Categories
            </a>

            <?php if(isset($_SESSION['username'])): ?>

                <a
                    class="btn btn-outline-light me-2"
                    href="/mvc-blog-system/public/profile"
                >
                    Profile
                </a>

                <span class="text-white me-3 fw-bold">
                    <?= htmlspecialchars($_SESSION['username']) ?>
                </span>

                <a
                    class="btn btn-danger"
                    href="/mvc-blog-system/public/logout"
                >
                    Logout
                </a>

            <?php else: ?>

                <a
                    class="btn btn-success me-2"
                    href="/mvc-blog-system/public/login"
                >
                    Login
                </a>

                <a
                    class="btn btn-primary"
                    href="/mvc-blog-system/public/register"
                >
                    Register
                </a>

            <?php endif; ?>

        </div>

    </div>
</nav>

<div class="container mt-4">

    <?php if(isset($_SESSION['success'])): ?>

        <div class="alert alert-success alert-dismissible fade show">
            <?= $_SESSION['success'] ?>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>
        </div>

        <?php unset($_SESSION['success']); ?>

    <?php endif; ?>

    <?php if(isset($_SESSION['error'])): ?>

        <div class="alert alert-danger alert-dismissible fade show">
            <?= $_SESSION['error'] ?>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>
        </div>

        <?php unset($_SESSION['error']); ?>

    <?php endif; ?>