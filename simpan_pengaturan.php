<?php

include "koneksi.php";

$mulai = $_POST['mulai'];
$selesai = $_POST['selesai'];

mysqli_query($koneksi,"INSERT INTO pengaturan (tanggal_mulai,tanggal_selesai)
VALUES ('$mulai','$selesai')");

header("location:index.php");

?>