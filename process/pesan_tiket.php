<?php 
session_start();
require '../config/conn.php';

if(isset($_POST['pesan'])){
    $nama_lengkap = ucwords($_POST['nama_lengkap']);
    $no_identitas = $_POST['no_identitas'];
    $no_hp = $_POST['no_hp'];
    $wisata_id = $_POST['wisata_id'];
    $tanggal = $_POST['tanggal'];
    $jml_dewasa = $_POST['jml_dewasa'];
    $jml_anak = $_POST['jml_anak'];
    $total_bayar = $_POST['total_bayar'];

    $query = mysqli_query($con,"INSERT INTO pesanan (nama_lengkap,no_identitas,no_hp,tanggal,jml_dewasa,jml_anak,total_bayar,wisata_id) VALUES ('$nama_lengkap','$no_identitas','$no_hp','$tanggal','$jml_dewasa','$jml_anak','$total_bayar','$wisata_id')");
    
    if ($query) {
        $success = 'Anda telah berhasil memesan tiket';
    } else {
        $error = 'Anda gagal memesan tiket';
    }

    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../index.php?pesan-tiket');

}

?>