<?php
include 'koneksi.php';

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (
    empty($_POST['prodi_jurusan']) ||
    empty($_POST['kode_prodi']) ||
    empty($_POST['status']) ||
    empty($_POST['jenjang']) ||
    empty($_POST['fakultas'])
) {
    exit();
}

$prodi_jurusan = validate($_POST['prodi_jurusan']);
$kode_prodi = validate($_POST['kode_prodi']);
$status = validate($_POST['status']);
$jenjang = validate($_POST['jenjang']);
$kaprodi = validate($_POST['kaprodi']); 
$fakultas = validate($_POST['fakultas']);

$query = "INSERT INTO program_studi (prodi_jurusan, kode_prodi, status, jenjang, kaprodi, fakultas) 
          VALUES (?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($koneksi, $query);

if ($stmt === false) {
    die("Error preparing statement: " . mysqli_error($koneksi));
}

mysqli_stmt_bind_param($stmt, "ssssss", 
    $prodi_jurusan, 
    $kode_prodi, 
    $status, 
    $jenjang, 
    $kaprodi, 
    $fakultas
);

if (mysqli_stmt_execute($stmt)) {
    header("Location: index.php?success=added");
    exit();
} else {
    echo "<h1>Gagal Menyimpan Data!</h1>";
    echo "<p>Terjadi kesalahan saat menyimpan data: " . mysqli_error($koneksi) . "</p>";
    echo "<p><a href='input.php'>Kembali ke Form Input</a></p>";
}

mysqli_stmt_close($stmt);
mysqli_close($koneksi);
?>