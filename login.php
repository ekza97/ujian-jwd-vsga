<?php
session_start();
include('config/conn.php');
include('config/function.php');

if (isset($_POST['cek_login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) && empty($password)) {
        $error = 'Harap isi username dan password';
    } else {
        $user = mysqli_query($con, "SELECT * FROM pengguna WHERE username='$username'") or die(mysqli_error($con));
        if (mysqli_num_rows($user) != 0) {
            $data = mysqli_fetch_array($user);
            if (password_verify($password, $data['password'])) {
                $_SESSION['id'] = $data['id'];
                $_SESSION['username'] = $data['username'];
                $_SESSION['nama'] = $data['nama'];
                header("Location:admin.php");
            } else {
                $error = 'Username atau password anda salah';
            }
        } else {
            $error = 'Username atau password anda salah';
        }
    }
    $_SESSION['error'] = $error;
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pemesanan Tiket Wisata | Ujian JWD VSGA Eka Saputra</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

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
    </style>


    <!-- Custom styles for this template -->
    <link href="assets/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <form action="" method="post">
            <!-- <img class="mb-4" src="" alt="" width="72" height="57"> -->
            <h1 class="h3 mb-3 fw-normal">Halaman Login</h1>
            <?php if (isset($_SESSION['error'])) : ?>
            <div class="alert alert-danger fade show" role="alert">
                <strong>Error !</strong> <?= $_SESSION['error']; ?>.
            </div>
            <?php endif;
            unset($_SESSION['error']); ?>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" name="username" placeholder="Username">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password"
                    placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <!-- <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div> -->
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="cek_login">Sign in</button>
            <a href="index.php" class="btn btn-default mt-3">Kembali</a>
            <p class="mt-5 mb-3 text-muted">&copy; <?= date('Y'); ?> </p>
        </form>
    </main>

</body>
<script>
var alertList = document.querySelectorAll('.alert')
alertList.forEach(function(alert) {
    new bootstrap.Alert(alert)
})
</script>

</html>