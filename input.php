<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Program Studi</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 500px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input[type="text"], select { width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; box-sizing: border-box; }
        .btn-submit { margin-top: 20px; padding: 10px 15px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; }
        .btn-submit:hover { background-color: #0056b3; }
        .pesan-error { color: red; font-weight: bold; margin-bottom: 15px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Tambah Data Program Studi</h2>
    
    <?php
    if (isset($_GET['error']) && $_GET['error'] == 'empty') {
        echo '<p class="pesan-error">Gagal Menyimpan Data! Pastikan semua field sudah terisi.</p>';
    }
    ?>

    <form action="proses_input.php" method="POST">
        <label for="prodi_jurusan">Prodi/Jurusan:</label>
        <input type="text" id="prodi_jurusan" name="prodi_jurusan" required>

        <label for="kode_prodi">Kode Prodi:</label>
        <input type="text" id="kode_prodi" name="kode_prodi" required>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="">-- Pilih Status --</option>
            <option value="aktif">aktif</option>
            <option value="tidak aktif">tidak aktif</option>
        </select>

        <label for="jenjang">Jenjang:</label>
        <input type="text" id="jenjang" name="jenjang" required>

        <label for="kaprodi">Kaprodi:</label>
        <input type="text" id="kaprodi" name="kaprodi">

        <label for="fakultas">Fakultas:</label>
        <input type="text" id="fakultas" name="fakultas" required>
        
        <button type="submit" class="btn-submit">Simpan Data</button>
    </form>
    
    <p style="margin-top: 20px;"><a href="index.php">Kembali ke Daftar</a></p>
</div>

</body>
</html>