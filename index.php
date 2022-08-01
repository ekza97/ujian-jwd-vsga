<?php 
session_start();
require "config/function.php";
require "config/conn.php";
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS 5.0 -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <title>Pemesanan Tiket Wisata | Ujian JWD VSGA Eka Saputra</title>
</head>

<body>
    <div class="container">
        <?php
        if (isset($_GET['daftar-harga'])) {
            $daftar_harga = true;
            $view = 'views/daftar_harga.php';
        } elseif (isset($_GET['pesan-tiket'])) {
            $pesan_tiket = true;
            $view = 'views/pesan_tiket.php';
        } else {
            $home = true;
            $view = 'views/home.php';
        } ?>
        <!-- Navigasi top menu  -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary mt-2">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">JWD_VSGA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?=isset($home)?'active':'';?>" href="?home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?=isset($daftar_harga)?'active':'';?>" href="?daftar-harga">Daftar
                                Harga</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?=isset($pesan_tiket)?'active':'';?>" href="?pesan-tiket">Pesan
                                Tiket</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navigasi top menu  -->

        <?php include($view) ?>

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap 5.0 Bundle with Popper -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="assets/vendor/jquery-mask/jquery-mask.min.js"></script>
    <script>
    $('.uang').mask('000.000.000.000.000', {
        reverse: true
    });
    $('.angka').mask('00000000000000000000', {
        reverse: true
    });
    $('.nip').mask('0000000000000000', {
        reverse: true
    });
    $('.no_hp').mask('000000000000', {
        reverse: true
    });
    </script>
</body>

</html>