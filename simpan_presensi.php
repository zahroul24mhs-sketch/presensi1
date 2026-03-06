<?php

include "koneksi.php";

$pengaturan_id = $_POST['pengaturan_id'];
$tanggal = $_POST['tanggal'];
$status = $_POST['status'];

$cek = mysqli_query($koneksi,"SELECT * FROM presensi 
WHERE tanggal='$tanggal' AND pengaturan_id='$pengaturan_id'");

if(mysqli_num_rows($cek) > 0){

    mysqli_query($koneksi,"UPDATE presensi 
    SET status='$status' 
    WHERE tanggal='$tanggal' AND pengaturan_id='$pengaturan_id'");

}else{

    mysqli_query($koneksi,"INSERT INTO presensi(pengaturan_id,tanggal,status) 
    VALUES('$pengaturan_id','$tanggal','$status')");

}

header("Location: dashboard.php?id=".$pengaturan_id);
exit;

include "koneksi.php";

$tanggal = $_POST['tanggal'];
$status = $_POST['status'];
$pengaturan_id = $_POST['pengaturan_id'];

mysqli_query($koneksi,"
INSERT INTO presensi (tanggal,status,pengaturan_id)
VALUES ('$tanggal','$status','$pengaturan_id')
");

header("Location: dashboard.php?id=$pengaturan_id&tanggal=$tanggal");

?>