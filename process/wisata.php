<?php 
session_start();
require '../config/conn.php';
require '../config/function.php';

if(isset($_POST['simpan'])){
    $nama = ucwords($_POST['nama']);
    $alamat = $_POST['alamat'];
    $harga = delMask($_POST['harga']);

    $file       = $_FILES['cover'];
    $filename    = $_FILES['cover']['name'];
    $filetmp     = $_FILES['cover']['tmp_name'];
    $filesize    = $_FILES['cover']['size'];
    $filetype    = $_FILES['cover']['type'];
    $fileext     = explode('.', $filename);
    $fileactext  = strtolower(end($fileext));
    $allowed    = array('jpg', 'png', 'jpeg');

    if (in_array($fileactext, $allowed)) {
        if ($filesize < 2048000) {
            $filenew = $nama . "-" . date('YmdHis') . "." . $fileactext;
            $filefolder = '../uploads/wisata/cover/' . $filenew;
            move_uploaded_file($filetmp, $filefolder);

            $query = mysqli_query($con, "INSERT INTO wisata (nama,alamat,harga,cover) VALUES ('$nama','$alamat','$harga','$filenew')") or die(mysqli_error($con));

            if ($query) {
                $success = "Berhasil menambahkan data wisata";
            } else {
                $error = "Gagal menambahkan data wisata";
            }
        } else {
            $error = "Ukuran file yang anda upload terlalu besar.";
        }
    } else {
        $error = "Format file yang anda upload tidak sesuai.";
    }

    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../admin.php?data-wisata');
}
if (isset($_POST['delete-wisata'])) {
    $id = $_POST['id'];
    $oldImage = $_POST['oldImage'];
    $delete = mysqli_query($con, "DELETE FROM wisata WHERE idwisata=$id");
    if ($delete) {
        if ($oldImage) {
            unlink('../uploads/wisata/cover/' . $oldImage);
        }
        $success = "Data wisata berhasil dihapus";
    } else {
        $error = "Data wisata gagal dihapus";
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../admin.php?data-wisata');
}
?>