<?php
date_default_timezone_set('Asia/Jayapura');

function session_timeout()
{
    //lama waktu 30 menit = 1800
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
        session_unset();
        session_destroy();
        header("Location:" . base_url() . "login.php");
    }
    $_SESSION['LAST_ACTIVITY'] = time();
}
function delMask($str)
{
    return (int)implode('', explode('.', $str));
}
function money($str)
{
    return 'Rp.' . number_format($str, 0, ',', '.');
}
function hakAkses(array $a)
{
    $akses = $_SESSION['level'];
    if (!in_array($akses, $a)) {
        // header('Location:?');
        echo '<script>window.location = "?#";</script>';
    }
}
function __session($param = null)
{
    return $_SESSION[$param];
}

function count_table($table)
{
    include('conn.php');
    $query = mysqli_query($con, "SELECT * FROM $table");
    $data = mysqli_num_rows($query);
    return $data;
}

function list_wisata()
{
    include('conn.php');
    $query = mysqli_query($con, "SELECT * FROM wisata ORDER BY nama ASC");
    $opt = "";
    while ($row = mysqli_fetch_array($query)) {
        $opt .= "<option value=\"" . $row['idwisata'] . "\">" . $row['nama'] . "</option>";
    }
    return $opt;
}

function encrypt($str)
{
    return base64_encode($str);
}
function decrypt($str)
{
    return base64_decode($str);
}

function base_url()
{
    $base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
    $base_url .= "://" . $_SERVER['HTTP_HOST'];
    $base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
    return $base_url;
}