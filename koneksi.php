<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "presensi_magang";

$koneksi = mysqli_connect($host,$user,$password,$db);

if(!$koneksi){
    die("Koneksi gagal");
}

?>