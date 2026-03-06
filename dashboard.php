<?php

include "koneksi.php";

if(!isset($_GET['id']) || $_GET['id']==""){
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

$pengaturan = mysqli_fetch_assoc(
    mysqli_query($koneksi,"SELECT * FROM pengaturan WHERE id='$id'")
);

if(!$pengaturan){
    header("Location: index.php");
    exit;
}

$mulai = new DateTime($pengaturan['tanggal_mulai']);
$selesai = new DateTime($pengaturan['tanggal_selesai']);

if(isset($_GET['tanggal'])){
    $tanggal = $_GET['tanggal'];
}else{
    $tanggal = date("Y-m-d");
}

$sekarang = new DateTime($tanggal);

$boleh_presensi = true;

if($sekarang < $mulai || $sekarang > $selesai){
    $boleh_presensi = false;
}

$hari_magang = $mulai->diff($sekarang)->days + 1;
$sisa = $sekarang->diff($selesai)->days;

$cek = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM presensi 
WHERE tanggal='$tanggal' AND pengaturan_id='$id'"));

$next = date("Y-m-d",strtotime("+1 day",strtotime($tanggal)));
$before = date("Y-m-d",strtotime("-1 day",strtotime($tanggal)));

?>

<!DOCTYPE html>
<html>
<head>

<title>Dashboard Presensi</title>
<link rel="stylesheet" href="css/style.css">

</head>

<body>

<a href="index.php">
<button>Menu Utama</button>
</a>

<div class="container">

<h2>Dashboard Presensi</h2>

<p>Tanggal : <b><?php echo date("d F Y",strtotime($tanggal)) ?></b></p>
<p>Hari Magang : <?php echo $hari_magang ?></p>
<p>Sisa Hari : <?php echo $sisa ?></p>

<hr>

<a href="?id=<?php echo $id ?>&tanggal=<?php echo $before ?>">⬅ Sebelumnya</a>

|

<a href="?id=<?php echo $id ?>&tanggal=<?php echo $next ?>">Berikutnya ➡</a>

<br><br>

<form method="GET">

<input type="hidden" name="id" value="<?php echo $id ?>">

<input type="date" name="tanggal" value="<?php echo $tanggal ?>">

<button type="submit">Lihat</button>

</form>

<hr>

<?php
if($cek){
    echo "<h3>Status Presensi : ".$cek['status']."</h3>";
}
?>

<?php
if(!$boleh_presensi){
echo "<div class='alert'>Tanggal ini berada di luar periode magang!</div>";
}
?>

<?php
if($boleh_presensi && !$cek){
?>

<form action="simpan_presensi.php" method="POST">

<input type="hidden" name="pengaturan_id" value="<?php echo $id ?>">
<input type="hidden" name="tanggal" value="<?php echo $tanggal ?>">

<button name="status" value="Hadir">Hadir</button>
<button name="status" value="Izin">Izin</button>
<button name="status" value="Sakit">Sakit</button>
<button name="status" value="Alpha">Alpha</button>
<button name="status" value="Libur">Libur</button>

</form>

<?php } ?>

<br>

<a href="rekap.php?id=<?php echo $id ?>">Lihat Rekap Kalender</a>

</div>

</body>
</html>