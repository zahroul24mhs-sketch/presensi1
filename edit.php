<?php
include "koneksi.php";

if(!isset($_GET['id'])){
    echo "Data tidak ditemukan";
    exit;
}

$id = $_GET['id'];

$query = mysqli_query($koneksi,"SELECT * FROM presensi WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

if(!$data){
    echo "Data tidak ditemukan";
    exit;
}

$pengaturan_id = $data['pengaturan_id'];
?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Presensi</title>
<link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="container">

<h2>Edit Presensi</h2>

<form action="update_presensi.php" method="POST">

<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
<input type="hidden" name="pengaturan_id" value="<?php echo $pengaturan_id; ?>">

<p>
Tanggal : 
<b><?php echo date("d F Y", strtotime($data['tanggal'])); ?></b>
</p>

<select name="status">

<option value="Hadir" <?php if($data['status']=="Hadir") echo "selected"; ?>>
Hadir
</option>

<option value="Izin" <?php if($data['status']=="Izin") echo "selected"; ?>>
Izin
</option>

<option value="Sakit" <?php if($data['status']=="Sakit") echo "selected"; ?>>
Sakit
</option>

<option value="Alpha" <?php if($data['status']=="Alpha") echo "selected"; ?>>
Alpha
</option>

<option value="Libur" <?php if($data['status']=="Libur") echo "selected"; ?>>
Libur
</option>

</select>

<br><br>

<button type="submit">Update</button>

</form>

<br>

<a href="rekap.php?id=<?php echo $pengaturan_id; ?>">Kembali</a>

</div>

</body>
</html>