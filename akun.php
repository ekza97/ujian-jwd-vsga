<?php 
include "config/conn.php";

$nama = 'Admin';
$username = 'admin';
$password = password_hash('admin', PASSWORD_DEFAULT);

$query = mysqli_query($con,"INSERT INTO pengguna (nama,username,password) VALUES ('$nama','$username','$password')") or die(mysqli_error($con));


?>