<!DOCTYPE html>
<html>
<head>
<title>Buat Presensi</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="container">

<h2>Buat Presensi Magang</h2>

<a href="index.php">
<button>Kembali</button>
</a>

<form action="simpan_pengaturan.php" method="POST">

<label>Tanggal Mulai</label>
<input type="date" name="mulai" required>

<label>Tanggal Selesai</label>
<input type="date" name="selesai" required>

<button type="submit">Simpan</button>

</form>

</div>

</body>
</html>