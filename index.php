<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kredit Bank</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/main.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .bg-baru {
            background-color: #d3d3d3;
        }

        main {
            flex: 1;
        }

        footer {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="./img/logo_kredit-transformed.png" alt="" width="100" height="50"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-white active" aria-current="page" href="#">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white-50" href="perhitungan-input.php">Form Perhitungan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white-50" href="perhitungan.php">Data Perhitungan</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <form action="logout.php" method="post" class="d-flex">
                                <button class="btn btn-outline-light" type="submit">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="px-4 py-3 my-5 text-start bg-baru container border-start border-dark">
            <h2 class="display-5 fw-bold pb-3">BERANDA</h2>
            <div class="col-lg-6">
                <p class="mb-2 fw-normal text-start fs-5">APLIKASI SIMULASI PERHITUNGAN KREDIT SEDERHANA</p>
                <p class="mb-4 fw-normal text-start fs-6">Dibuat Oleh: Danni Adhyatma Rachman</p>
            </div>
        </div>

        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="https://nadsepriani97.wordpress.com/wp-content/uploads/2017/01/area-chart-1.jpg" class="bd-placeholder-img card-img-top" width="100%" height="225" alt="Thumbnail">
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="https://nadsepriani97.wordpress.com/wp-content/uploads/2017/01/area-chart-1.jpg" class="bd-placeholder-img card-img-top" width="100%" height="225" alt="Thumbnail">
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="https://nadsepriani97.wordpress.com/wp-content/uploads/2017/01/area-chart-1.jpg" class="bd-placeholder-img card-img-top" width="100%" height="225" alt="Thumbnail">
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
    <footer class="py-2 bg-primary">
        <div class="container text-light text-center">
            <p class="display-6 mb-3">KREDIT</p>
            <small class="text-white">&copy; Copyright by Kredit. All rights reserved</small>
        </div>
    </footer>
</body>

</html>