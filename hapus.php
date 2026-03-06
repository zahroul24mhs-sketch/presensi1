<?php

include "koneksi.php";

if(!isset($_GET['id'])){
    echo "Data tidak ditemukan";
    exit;
}

$id = $_GET['id'];

/* ambil dulu pengaturan_id supaya bisa kembali ke rekap */
$data = mysqli_fetch_assoc(
mysqli_query($koneksi,"SELECT pengaturan_id FROM presensi WHERE id='$id'")
);

if(!$data){
    echo "Data tidak ditemukan";
    exit;
}

$pengaturan_id = $data['pengaturan_id'];

/* hapus data */
mysqli_query($koneksi,"DELETE FROM presensi WHERE id='$id'");

/* kembali ke rekap sesuai id */
header("Location: rekap.php?id=$pengaturan_id");
exit;

?>