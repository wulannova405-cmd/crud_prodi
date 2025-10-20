<?php
include 'koneksi.php';

if (
    !isset($_POST['id']) ||
    empty($_POST['prodi_jurusan']) ||
    empty($_POST['kode_prodi']) ||
    empty($_POST['status']) ||
    empty($_POST['jenjang']) ||
    empty($_POST['fakultas'])
) {
    echo "Data tidak lengkap atau ID tidak valid. Gagal menyimpan perubahan.";
    exit();
}

$id = mysqli_real_escape_string($koneksi, $_POST['id']);
$prodi_jurusan = mysqli_real_escape_string($koneksi, $_POST['prodi_jurusan']);
$kode_prodi = mysqli_real_escape_string($koneksi, $_POST['kode_prodi']);
$status = mysqli_real_escape_string($koneksi, $_POST['status']);
$jenjang = mysqli_real_escape_string($koneksi, $_POST['jenjang']);
$kaprodi = mysqli_real_escape_string($koneksi, $_POST['kaprodi']);
$fakultas = mysqli_real_escape_string($koneksi, $_POST['fakultas']);

$query = "UPDATE program_studi SET 
            prodi_jurusan = ?, 
            kode_prodi = ?, 
            status = ?, 
            jenjang = ?, 
            kaprodi = ?, 
            fakultas = ?
          WHERE id = ?"; 

$stmt = mysqli_prepare($koneksi, $query);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ssssssi", 
        $prodi_jurusan, 
        $kode_prodi, 
        $status, 
        $jenjang, 
        $kaprodi, 
        $fakultas, 
        $id
    );

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php?success=updated");
        exit();
    } else {
        echo "<h1>Gagal Mengupdate Data!</h1>";
        echo "<p>Terjadi kesalahan saat menyimpan perubahan: " . mysqli_error($koneksi) . "</p>";
        echo "<p><a href='edit.php?id={$id}'>Kembali ke Form Edit</a></p>";
    }
    mysqli_stmt_close($stmt);
} else {
    die("Error preparing statement: " . mysqli_error($koneksi));
}
mysqli_close($koneksi);
?>