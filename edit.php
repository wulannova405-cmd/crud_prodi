<?php
include 'koneksi.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: index.php?error=no_id");
    exit();
}

$id = $_GET['id'];

$query = "SELECT * FROM program_studi WHERE id = ?";
$stmt = mysqli_prepare($koneksi, $query);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $id); 
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
} else {
    die("Error mempersiapkan statement: " . mysqli_error($koneksi));
}

if (!$data) {
    echo "Data Program Studi tidak ditemukan.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Program Studi</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 500px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input[type="text"], select { width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; box-sizing: border-box; }
        .btn-submit { margin-top: 20px; padding: 10px 15px; background-color: #ffc107; color: black; border: none; border-radius: 5px; cursor: pointer; }
        .btn-submit:hover { background-color: #e0a800; }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Data Program Studi</h2>
    
    <form action="proses_edit.php" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($data['id']); ?>">
        
        <label for="prodi_jurusan">Prodi/Jurusan:</label>
        <input type="text" name="prodi_jurusan" value="<?php echo htmlspecialchars($data['prodi_jurusan']); ?>" required>

        <label for="kode_prodi">Kode Prodi:</label>
        <input type="text" name="kode_prodi" value="<?php echo htmlspecialchars($data['kode_prodi']); ?>" required>

        <label for="status">Status:</label>
        <select name="status" required>
            <option value="aktif" <?php echo ($data['status'] == 'aktif') ? 'selected' : ''; ?>>aktif</option>
            <option value="tidak aktif" <?php echo ($data['status'] == 'tidak aktif') ? 'selected' : ''; ?>>tidak aktif</option>
        </select>

        <label for="jenjang">Jenjang:</label>
        <input type="text" name="jenjang" value="<?php echo htmlspecialchars($data['jenjang']); ?>" required>

        <label for="kaprodi">Kaprodi:</label>
        <input type="text" name="kaprodi" value="<?php echo htmlspecialchars($data['kaprodi']); ?>">

        <label for="fakultas">Fakultas:</label>
        <input type="text" name="fakultas" value="<?php echo htmlspecialchars($data['fakultas']); ?>" required>
        
        <button type="submit" class="btn-submit">Simpan Perubahan</button>
    </form>
</div>

</body>
</html>