<?php
session_start();
require "../koneksi.php"; // Koneksi ke database
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <title>Register</title>
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

    .register-box {
        width: 100%;
        max-width: 600px;
        padding: 30px;
        background-color: #fff;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    .register-box h2 {
        margin-bottom: 20px;
    }

    .data {
        margin-bottom: 15px;
    }

    .span {
        color: red;
    }

    .register-link {
        text-align: right;
        font-size: 12px;
        font-family: 'Times New Roman', Times, serif;
    }

    /* Media query untuk layar lebih kecil */
    @media (max-width: 768px) {
        .register-box {
            padding: 20px;
        }

        .register-link {
            text-align: center;
        }
    }
</style>


<body>
    <div class="main d-flex flex-column justify-content-center align-items-center">
        <div class="register-box">
            <h2 class="text-center">Register</h2>
            <form action="" method="post">
                <div class="data">
                    <label for="email">Email<span class="span">*</span></label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>

                <div class="data">
                    <label for="password">Password<span class="span">*</span></label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="data">
                    <label for="cpassword">Konfirmasi Kata Sandi<span class="span">*</span></label>
                    <input type="password" class="form-control" name="cpassword" id="cpassword" required>
                </div>

                <div class="mb-3">
                    <span class="register-link">Sudah punya akun? <a href="login.php" class="text-decoration-none text-danger">Klik di sini</a> untuk masuk</span>
                </div>
                <div>
                    <button class="btn btn-danger form-control mt-3" type="submit" name="registerbtn">Register</button>
                </div>
            </form>
        </div>
        <div class="nilai mt-3">
            <?php
            // Proses registrasi
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registerbtn'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $confirm_password = $_POST['cpassword'];

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
                                title: "Registrasi berhasil!",
                                text: "Akun berhasil dibuat, Silakan login.",
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
                                title: "Gagal mendaftarkan pengguna!",
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
                            text: "Kata sandi dan konfirmasi tidak cocok.",
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