<?php
session_start();
require "../koneksi.php"; // Koneksi ke database
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<style>
    .main {
        height: 100vh;
        background: linear-gradient(45deg, #800000, #cc0000);
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .login-box {
        width: 100%;
        max-width: 600px;
        padding: 30px;
        background-color: #fff;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    .login-box h2 {
        margin-bottom: 20px;
    }

    .data {
        margin-bottom: 15px;
    }

    .span {
        color: red;
    }

    .login-link {
        text-align: right;
        font-size: 12px;
        font-family: 'Times New Roman', Times, serif;
    }

    /* Media query untuk layar lebih kecil */
    @media (max-width: 768px) {
        .login-box {
            padding: 20px;
        }

        .login-link {
            text-align: center;
        }
    }
</style>

<body>
    <div class="container-fluid main d-flex flex-column justify-content-center align-items-center">
        <div class="login-box">
            <h2 class="text-center">Login</h2>
            <form action="utama.php" method="post">
                <div class="data mb-3">
                    <label for="email">Email<span class="span">*</span></label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <div class="data mb-3">
                    <label for="password">Password<span class="span">*</span></label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="mb-3">
                    <span class="login-link">Belum punya akun? <a href="register.php" class="text-decoration-none text-danger">Klik di sini</a> untuk daftar</span>
                </div>
                <div>
                    <button class="btn btn-danger w-100 mt-3" type="submit" name="loginbtn">Login</button>
                </div>
            </form>
        </div>

        <div class="nilai mt-3">
            <?php
            // Proses login
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['loginbtn'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];

                // Validasi password dan konfirmasi password
                if ($password == $confirm_password) {
                    // Hash password untuk keamanan
                    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    // Menggunakan prepared statement untuk memasukkan data ke database
                    $stmt = mysqli_prepare($conn, "INSERT INTO tbl_users (email, password) VALUES (?, ?)");
                    mysqli_stmt_bind_param($stmt, "ss", $email, $password);

                    if (mysqli_stmt_execute($stmt)) {
                        echo '<script>
                            Swal.fire({
                                icon: "success",
                                title: "Login berhasil!",
                                text: "Akun berhasil dibuat. Silakan login.",
                                showConfirmButton: true
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "login.php";
                                }
                            });
                        </script>';
                    } else {
                        echo '<script>
                            Swal.fire({
                                icon: "error",
                                title: "Gagal masuk!!",
                                text: "Terjadi kesalahan, coba lagi.",
                            });
                        </script>';
                    }
                    mysqli_stmt_close($stmt);
                } else {
                    echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "Kata sandi tidak cocok!",
                            text: "Kata sandi yang anda buat salah!",
                        });
                    </script>';
                }
            }

            mysqli_close($conn);
            ?>
        </div>
    </div>
</body>

</html>