<?php
    $hostname   = "localhost";
    $username   = "root";
    $password   = "root";
    $database   = "ujian_jwd";

    $con = mysqli_connect($hostname, $username, $password, $database) or die (mysqli_error($con));