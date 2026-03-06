<?php
include "koneksi.php";

$data = mysqli_query($koneksi,"SELECT * FROM pengaturan ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Presensi Magang</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="container">

<h2>Daftar Presensi Magang</h2>

<a href="buat_presensi.php">
<button>Buat Presensi Baru</button>
</a>

<hr>

<table>

<tr>
<th>ID</th>
<th>Mulai</th>
<th>Selesai</th>
<th>Aksi</th>
</tr>

<?php

while($row=mysqli_fetch_assoc($data)){

echo "<tr>";

echo "<td>".$row['id']."</td>";
echo "<td>".$row['tanggal_mulai']."</td>";
echo "<td>".$row['tanggal_selesai']."</td>";

echo "<td>

<a href='dashboard.php?id=".$row['id']."'>Masuk</a> |

<a href='reset.php?id=".$row['id']."' 
onclick=\"return confirm('Reset presensi ini?')\">
Reset
</a>

</td>";

echo "</tr>";

}

?>

</table>

</div>

</body>
</html>