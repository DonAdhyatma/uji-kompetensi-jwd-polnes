<?php
session_start(); // Mulai session untuk menyimpan informasi login

// Include file koneksi.php untuk menghubungkan ke database
require_once "koneksi.php";

// Jika form login dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk mencari user berdasarkan email
    $query = "SELECT * FROM login WHERE email = '$email'";
    $result = $koneksi->query($query);

    if ($result->num_rows == 1) {
        // User ditemukan, periksa password
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Password benar, buat session untuk user yang login
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_nama'] = $user['nama'];
            $_SESSION['user_email'] = $user['email'];

            // Redirect ke halaman setelah login berhasil
            header("Location: index.php");
            exit;
        } else {
            // Password salah
            // $error = "Email atau password salah.";
        }
    } else {
        // User tidak ditemukan
        $error = "Email atau password salah.";
    }
}

// Tutup koneksi ke database
$koneksi->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Bioskop XXI</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/main.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style/signin.css">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .form-signin {
            max-width: 400px;
            padding: 15px;
            margin: auto;
            background-color: #f8f9fa;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-control {
            height: 50px;
            width: 100%;
            font-size: 1.2rem;
        }
    </style>
</head>

<body>
    <div class="center-container">
        <main class="form-signin text-center">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()">
                <img class="mb-4" src="img/logo_kredit-transformed.png" alt="" width="150" height="150">
                <h1 class="h3 mb-3 fw-normal">Please Log In</h1>

                <?php if (!empty($error)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>

                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>

                <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                <a href="register.php" class="btn btn-link">Belum memiliki akun? <br> Sign up di sini</a>
                <p class="mt-5 mb-3 text-muted">&copy; KREDIT 2024</p>
            </form>
        </main>
    </div>
</body>

</html>