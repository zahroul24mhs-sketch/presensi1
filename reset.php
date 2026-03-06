<?php

include "koneksi.php";

$id = $_GET['id'];

mysqli_query($koneksi,
"DELETE FROM presensi WHERE pengaturan_id='$id'"
);

mysqli_query($koneksi,
"DELETE FROM pengaturan WHERE id='$id'"
);

header("location:index.php");

?>