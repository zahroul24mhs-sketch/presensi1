<?php

include "koneksi.php";

$id = $_POST['id'];
$status = $_POST['status'];
$pengaturan_id = $_POST['pengaturan_id'];

mysqli_query($koneksi,"UPDATE presensi 
SET status='$status'
WHERE id='$id'");

header("Location: rekap.php?id=$pengaturan_id");
exit;

?>