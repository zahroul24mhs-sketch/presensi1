<?php
include "koneksi.php";

if(!isset($_GET['id'])){
    echo "ID tidak ditemukan";
    exit;
}

$id = $_GET['id'];

$data = mysqli_query($koneksi,"SELECT * FROM presensi 
WHERE pengaturan_id='$id' ORDER BY tanggal");
?>

<!DOCTYPE html>
<html>
<head>

<title>Rekap Presensi</title>
<link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="container">

<h2>Rekap Presensi</h2>

<table>

<tr>
<th>Tanggal</th>
<th>Status</th>
<th>Aksi</th>
</tr>

<?php

while($row=mysqli_fetch_assoc($data)){

$status=$row['status'];

$color="";

if($status=="Hadir") $color="green";
if($status=="Izin") $color="blue";
if($status=="Sakit") $color="orange";
if($status=="Alpha") $color="red";
if($status=="Libur") $color="gray";

echo "<tr>";

echo "<td>".$row['tanggal']."</td>";

echo "<td style='color:$color'><b>$status</b></td>";

echo "<td>

<a href='edit.php?id=".$row['id']."'>Edit</a> |

<a href='hapus.php?id=".$row['id']."' 
onclick=\"return confirm('Yakin ingin menghapus?')\">Hapus</a>

</td>";

echo "</tr>";

}
?>

</table>

<br>

<a href="dashboard.php?id=<?php echo $id; ?>">Kembali</a>

</div>

</body>
</html>